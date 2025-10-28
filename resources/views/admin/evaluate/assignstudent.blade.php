@extends('admin.layouts.app')

@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student List</h1>
            </div>
            <div class="col-sm-6 text-right">
                {{-- <a href="{{route('evaluate.create')}}" class="btn btn-primary">Add Evaluate</a> --}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @include('admin.message')
        <div class="card">
           
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            {{-- <th>Email</th> --}}
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        @foreach ($assigStudents as $studenlist)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$studenlist->student_name ?? 'Demo'}}</td>
                            {{-- <td> {{$studenlist->email}}</td> --}}
                            <td>
                                <a href="{{ route('student.questionList', $studenlist->student_id) }}" class="btn btn-primary">View Assigned Answers</a>
                            </td>
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>

@endsection

@section('customJs')

@endsection