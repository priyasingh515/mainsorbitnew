<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TeacherState;
use App\Models\AnswerSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DoubtResolvedMail;
use App\Mail\AnswerSheetCheckedMail;
use DB;

class EvaluateController extends Controller
{
    //
    public function index(){
        
        $evaluate = User::where('role',3)->with('states')->get();
        return view('admin.evaluate.index',compact('evaluate'));
    }
    public function create(){
        return view('admin.evaluate.create');
    }
    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //         'role' => 'required|integer',
    //         'state'=>'required'
    //     ]);
        
    //     $evaluate = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'role' => $request->role, 
    //         'password' => bcrypt($request->password), 
    //         'state' => $request->state, 
    //     ]);
        
    //     return redirect()->route('evaluate.index')->with('success', 'Evaluate Create successfully!');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required|integer',
            'subject'=>'nullable',
            'state' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
                'subject' => $request->subject,
            ]);
        }

        $alreadyHas = DB::table('teacher_states')
            ->where('user_id', $user->id)
            ->where('state', $request->state)
            ->exists();

        if (!$alreadyHas) {
            DB::table('teacher_states')->insert([
                'user_id' => $user->id,
                'state' => $request->state,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect('admin/evaluate')->with('success', 'Evaluator assigned to state successfully!');
    }

    public function edit($id){
            $evaluate = User::find($id);
        return view('admin.evaluate.edit',compact('evaluate'));
    }

    public function update(Request $request, $id)
    {
        $evaluate = User::findOrFail($id);     

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Ensure unique email except current user
            'password' => 'nullable|min:6', 
            'subject' => 'nullable', 
            
        ]);
    
        // Update User Data    
        $evaluate->name = $request->input('name');
        $evaluate->email = $request->input('email');
        $evaluate->subject = $request->input('subject');
        
        // Check if Password Field is Filled
        if ($request->filled('password')) {
            $evaluate->password = bcrypt($request->password);
        }
    
        $evaluate->save();
        //   dd($evaluate);
    
        // Redirect with Success Message

        // return response()->json(['message' => 'Post updated successfully', 'post' => $post]);

        return redirect()->route('evaluate.index')->with('success', 'Evaluate Updated successfully!');

    }

    public function assignnedStudent()
    {
        $teacherId = Auth::id();

        $assigStudents = DB::table('assigned_teacher')
            ->join('answer_sheets', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id')
            ->join('users', 'users.id', '=', 'answer_sheets.student_id')
            ->leftJoin('checked_answer_sheets', function($join) use ($teacherId) {
                $join->on('checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
                    ->where('checked_answer_sheets.teacher_id', '=', $teacherId);
            })
            ->where('assigned_teacher.teacher_id', $teacherId)
            ->where('answer_sheets.status', 'assigned') // Only pending answer sheets
            ->whereNull('checked_answer_sheets.id')     // Not yet checked
            ->select(
                'users.id as student_id',
                'users.name as student_name',
                'users.email',
                DB::raw('MIN(assigned_teacher.created_at) as first_assigned_at')
            )
            ->groupBy('users.id', 'users.name', 'users.email')
            ->get();

        return view('admin.evaluate.assignstudent', compact('assigStudents'));
    }


    public function student_questionList($studenId){
        $studentsList = DB::table('assigned_teacher')
            ->join('answer_sheets', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id')
            ->join('users', 'answer_sheets.student_id', '=', 'users.id')
            ->leftJoin('user_plans', 'users.id', '=', 'user_plans.user_id')
            ->leftJoin('plans', 'user_plans.plan_id', '=', 'plans.id')
            ->leftJoin('checked_answer_sheets','assigned_teacher.answersheet_id','=','checked_answer_sheets.answer_sheet_id')
            ->where('assigned_teacher.teacher_id', auth()->id())
            ->where('users.id', $studenId) 
            ->where('answer_sheets.status', 'assigned')
            ->select(
                'assigned_teacher.*', 
                'answer_sheets.answer_pdf', 
                'answer_sheets.status', 
                'answer_sheets.question_no', 
                'users.name as student_name', 
                'users.email as student_email',
                'plans.plan_name as plan_name',
                'checked_answer_sheets.created_at as check_date'
            )
            ->orderBy('assigned_teacher.created_at', 'desc')
            ->get();

        return view('admin.evaluate.studentanswerlist', compact('studentsList'));
    }

    public function student_answerEdit($id) {
        $studentanswerList = DB::table('assigned_teacher')
            ->join('answer_sheets', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id')
            ->join('users', 'answer_sheets.student_id', '=', 'users.id')
            ->where('assigned_teacher.id', $id) 
            ->select(
                'assigned_teacher.*', 
                'answer_sheets.answer_pdf', 
                'answer_sheets.status', 
                'users.name as student_name', 
                'users.email as student_email'
            )
            ->first();

        return view('admin.evaluate.studentedit', compact('studentanswerList'));
    }


    public function uploadCheckedSheet(Request $request)
    {
        $request->validate([
            'answer_sheet_id' => 'required|exists:answer_sheets,id',
            'checked_file' => 'required|mimes:pdf,jpg,png|max:10240',
            'remark' => 'nullable|string',
        ]);

        $fileName = time().'.'.$request->checked_file->extension();
        $request->checked_file->move(public_path('admin/user/checked'), $fileName);

        DB::table('checked_answer_sheets')->insert([
            'answer_sheet_id' => $request->answer_sheet_id,
            'teacher_id' => auth()->user()->id,
            'checked_file_path' => 'admin/user/checked/'.$fileName,
            'remark' => $request->remark,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Answer Sheet ka status update karein
        DB::table('answer_sheets')
            ->where('id', $request->answer_sheet_id)
            ->update(['status' => 'checked']);
        
        $answerSheet = AnswerSheet::find($request->answer_sheet_id);
        $student = User::find($answerSheet->student_id); 

        if($student && $student->email){
            Mail::to($student->email)->send(new AnswerSheetCheckedMail($student->name));
        }

        return redirect()->route('studentassign.list')->with('success', 'Checked Answer Sheet Uploaded');
    }

    public function destroy($id)
    {
        $evaluate = User::findOrFail($id);
        $evaluate->delete();

        return redirect()->route('evaluate.index')->with('success', 'Evaluate deleted successfully!');

    }

    // public function checkedList(){
    //     $teacherId = Auth::id(); 
    //     $checkedStudents = DB::table('checked_answer_sheets')
    //         ->Join('answer_sheets','checked_answer_sheets.answer_sheet_id','=','answer_sheets.id')
    //         ->Join('users','users.id','=','answer_sheets.student_id')
    //         ->where('teacher_id', $teacherId)
    //         ->select('checked_answer_sheets.*','checked_answer_sheets.created_at as check_date','users.email as email','users.name as student_name','answer_sheets.status','answer_sheets.answer_pdf')
    //         ->get();
    //     return view('admin.evaluate.checked_list',compact('checkedStudents'));
    // }

    public function assignStudents(){
    $teacherId = Auth::id();

    $assignedStudents = DB::table('assigned_teacher')
        ->join('answer_sheets', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id')
        ->join('users', 'users.id', '=', 'answer_sheets.student_id')
        ->join('checked_answer_sheets', function($join) use ($teacherId) {
            $join->on('checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
                 ->where('checked_answer_sheets.teacher_id', '=', $teacherId);
        })
        ->where('assigned_teacher.teacher_id', $teacherId)
        ->select(
            'users.id as student_id',
            'users.name as student_name',
            'users.email',
            DB::raw('MIN(assigned_teacher.created_at) as first_assigned_at')
        )
        ->groupBy('users.id', 'users.name', 'users.email')
        ->get();
    
    return view('admin.evaluate.student_list', compact('assignedStudents'));
}



    // public function checkedList(){
    //     $teacherId = Auth::id(); 

    //     $checkedStudents = DB::table('checked_answer_sheets')
    //         ->join('answer_sheets', 'checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
    //         ->join('users', 'users.id', '=', 'answer_sheets.student_id')
    //         ->join('assigned_teacher', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id') // Join with assigned_teachers
    //         ->where('checked_answer_sheets.teacher_id', $teacherId)
    //         ->select(
    //             'checked_answer_sheets.*',
    //             'checked_answer_sheets.created_at as check_date',
    //             'users.email as email',
    //             'users.name as student_name',
    //             'answer_sheets.status',
    //             'answer_sheets.answer_pdf',
    //             'answer_sheets.question_no',
    //             'assigned_teacher.created_at as assigned_date' // Assigned date
    //         )
    //         ->get();

    //     return view('admin.evaluate.checked_list', compact('checkedStudents'));
    // }

    public function checkedList($studentId)
    {
        $teacherId = Auth::id(); 

        $checkedStudents = DB::table('checked_answer_sheets')
            ->join('answer_sheets', 'checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
            ->join('users', 'users.id', '=', 'answer_sheets.student_id')
            ->join('assigned_teacher', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id')
            ->where('checked_answer_sheets.teacher_id', $teacherId)
            ->where('answer_sheets.student_id', $studentId) // ✅ Filter by student
            ->select(
                'checked_answer_sheets.*',
                'checked_answer_sheets.created_at as check_date',
                'users.email as email',
                'users.name as student_name',
                'answer_sheets.status',
                'answer_sheets.answer_pdf',
                'answer_sheets.question_no',
                'assigned_teacher.created_at as assigned_date'
            )->orderBy('assigned_teacher.created_at', 'desc')
            ->get();

        return view('admin.evaluate.checked_list', compact('checkedStudents'));
    }

    public function doubtstudent(){
        
        $teacherId = Auth::id();

        $studentsWithDoubts = DB::table('doubts')
            ->join('users', 'doubts.user_id', '=', 'users.id')
            ->where('doubts.teacher_id', $teacherId)
            ->select('users.id as student_id', 'users.name as student_name', 'users.email as student_email')
            ->distinct()
            ->get();
        return view('admin.evaluate.doubtstudent',compact('studentsWithDoubts'));
    }

    // public function studentMessage(){
    //     $teacherId = Auth::id(); 
    //     $Message = DB::table('doubts')
    //         ->join('users', 'doubts.user_id', '=', 'users.id')
    //         ->join('answer_sheets', 'doubts.answer_id', '=', 'answer_sheets.id')
    //         ->join('checked_answer_sheets', 'checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
    //         ->where('doubts.teacher_id', $teacherId)
    //         ->select('doubts.*', 'users.name as student_name', 'users.email as student_email', 'answer_sheets.answer_pdf as answer_sheet','checked_answer_sheets.checked_file_path as check_file')
    //         ->orderBy('doubts.created_at', 'desc')
    //         ->get();
    //     return view('admin.evaluate.message',compact('Message'));
    // }

    public function studentMessage($studentId)
    {
        $teacherId = Auth::id();

        // $Message = DB::table('doubts')
        //     ->join('users', 'doubts.user_id', '=', 'users.id')
        //     ->join('answer_sheets', 'doubts.answer_id', '=', 'answer_sheets.id')
        //     ->join('checked_answer_sheets', 'checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
        //     ->where('doubts.teacher_id', $teacherId)
        //     ->where('doubts.user_id', $studentId)
        //     ->select(
        //         'doubts.*',
        //         'users.name as student_name',
        //         'users.email as student_email',
        //         'answer_sheets.answer_pdf as answer_sheet',
        //         'checked_answer_sheets.checked_file_path as check_file'
        //     )
        //     ->orderBy('doubts.created_at', 'desc')
        //     ->get();

        $Message = DB::table('doubts')
        ->join('users', 'doubts.user_id', '=', 'users.id')
        ->join('answer_sheets', 'doubts.answer_id', '=', 'answer_sheets.id')
        ->join('checked_answer_sheets', 'checked_answer_sheets.answer_sheet_id', '=', 'answer_sheets.id')
        ->where('doubts.teacher_id', $teacherId)
        ->where('doubts.user_id', $studentId)
        ->select(
            'doubts.*',
            'users.name as student_name',
            'users.email as student_email',
            'answer_sheets.answer_pdf as answer_sheet',
            'checked_answer_sheets.checked_file_path as check_file'
        )
        ->orderByRaw("CASE WHEN doubts.status = 'pending' THEN 0 ELSE 1 END") // pending first
        ->orderBy('doubts.created_at', 'desc') // latest on top within group
        ->get();

        return view('admin.evaluate.message', compact('Message'));
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'doubt_id' => 'required|exists:doubts,id',
            'reply' => 'required|string|max:2000',
            'resolve_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:10240',
        ]);

        $resolveFilePath = null;

        if ($request->hasFile('resolve_file')) {
            $file = $request->file('resolve_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('resolves');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $file->move($destinationPath, $filename);
            $resolveFilePath = 'resolves/' . $filename;
        }

        DB::table('doubts')
            ->where('id', $request->doubt_id)
            ->update([
                'reply' => $request->reply,
                'resolve_file' => $resolveFilePath,
                'status' => 'active',
                'updated_at' => now(),
            ]);

        // Get user email
        $doubt = DB::table('doubts')->where('id', $request->doubt_id)->first();

        if ($doubt) {
            $user = DB::table('users')->where('id', $doubt->user_id)->first();

            if ($user && $user->email) {
                Mail::to($user->email)->send(new DoubtResolvedMail($request->reply, $resolveFilePath));
            }
        }

        return response()->json(['success' => 'Reply updated and email sent successfully!']);

    }
    
}
