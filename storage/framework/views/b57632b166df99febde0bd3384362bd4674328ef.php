

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Answer List</h1>
            </div>
        
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            
            <div class="card-body table-responsive p-0 mt-2">								
                <table class="table table-hover text-nowrap datatable">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>submition Date</th>
                            <th>checked Date</th>
                            <th>Answer Pdf</th>
                            <th>No of question</th>
                            <th>checked Pdf</th>
                            <th>Evaluator name</th>
                            <th>Answer Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php $__currentLoopData = $student; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $students): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($students->created_at)->format('d-M-Y')); ?></td>
                            <td>
                                <?php if($students->checked_date): ?>
                                   <?php echo e(\Carbon\Carbon::parse($students->checked_date)->format('d-M-Y')); ?>

                                <?php else: ?>
                                    Not Available
                                <?php endif; ?>

                            </td>
                            <td>
                                <a href="<?php echo e(url('public/'.$students->answer_pdf)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td><?php echo e($students->question_no); ?></td>
                            <td>
                                <?php if($students->check_file): ?>
                                    <a href="<?php echo e(asset('public/'.$students->check_file)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Checked Pdf" height="50" width="50">
                                    </a>
                                <?php else: ?>
                                    Not Available
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($students->evaluate_name): ?>
                                    <?php echo e($students->evaluate_name); ?>

                                <?php elseif($students->assigned_evaluate_name): ?>
                                    <?php echo e($students->assigned_evaluate_name); ?>

                                <?php else: ?>
                                    Not Available
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="javascript:void(0);" 
                                    class="badge status-badge 
                                    <?php if($students->status == 'pending'): ?> bg-danger 
                                    <?php elseif($students->status == 'assigned'): ?> bg-primary 
                                    <?php elseif($students->status == 'checked'): ?> bg-success 
                                    <?php endif; ?>"
                                    data-id="<?php echo e($students->id); ?>" 
                                    data-status="<?php echo e($students->status); ?>">
                                    <?php echo e(ucfirst($students->status)); ?>

                                </a>
                            </td>
                            <td>
                                
                                <?php if($students->status !='checked'): ?>
                                <a href="<?php echo e(route('student.ansswerEdit', ['id' => $students->id, 'type' => $students->state])); ?>">
                                    Click Here 
                                </a>
                                

                                <?php endif; ?>
                                <a href="<?php echo e(route('student.answer.delete', $students->id)); ?>" 
                                    class="text-danger" 
                                    onclick="return confirm('Are you sure you want to delete this answer sheet?');">
                                     <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                         <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                     </svg>
                                 </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/student/answerview.blade.php ENDPATH**/ ?>