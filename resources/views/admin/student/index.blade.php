@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student List</h1>
                </div>
                {{-- <div class="col-sm-6 text-right">
                    <a href="{{route('evaluate.create')}}" class="btn btn-primary">Add About</a>
                </div> --}}
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
                
                <div class="card-body table-responsive p-0 mt-2">
                    <table class="table table-hover text-nowrap datatable">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Name</th>
                                <th>Plan</th>
                                <th>Email</th>
                                <th>Answer sheets Count</th>
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =1;?>
                            @foreach ($student as $students)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$students->name ?? 'Demo'}}</td>
                                <td>
                                    @php 
                                                                 $plan = DB::table('user_plans')
                                        ->Join('plans', 'user_plans.plan_id', '=', 'plans.id')
                                        ->select(
                                            'plans.id',
                                            'plans.plan_name',
                                        )
                                        ->where('user_plans.user_id', $students->id)
                                        ->first();    
                                    @endphp
                                    @if($plan)
                                    {{ $plan->plan_name }}
                                    @else 
                                    Demo
                                    @endif
                                </td>
    
                                      
                                <td> {{$students->email}}</td>
                                <td><a href="{{route('student.view',$students->id)}}">{{$students->pending_count}}</a></td>
                                
                                <td>
                                    <a href="{{route('student.view',$students->id)}}">
                                        Click Here
                                    </a>
                                    <a href="{{route('cgstudent.delete',$students->id)}}" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
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
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('.datatable').DataTable({
            columnDefs: [
                { orderable: false, targets: [3] }
            ]
        });
    });
</script>
<script>
    $(document).ready(function () {
        if ($.fn.dataTable.isDataTable('.datatable')) {
            $('.datatable').DataTable().destroy();
        }

        var table = $('.datatable').DataTable({
            columnDefs: [
                { orderable: false, targets: [3] }
            ]
        });

        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search...'); // Add Bootstrap styling

    });
</script>
@endsection