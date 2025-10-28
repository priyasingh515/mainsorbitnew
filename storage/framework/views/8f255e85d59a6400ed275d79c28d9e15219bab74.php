

<?php $__env->startSection('content'); ?>

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Assigned Answer</h1>
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
            
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Answer sheet</th>
                            <th>No. of Question</th>
                            <th>Assigned Date</th>
                            <th>Plan</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php $__currentLoopData = $studentsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td>
                                <a href="<?php echo e(url('public/'.$student->answer_pdf)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td> <?php echo e($student->question_no); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($student->created_at)->format('d-M-Y')); ?></td>
                           
                            
                            <td><?php echo e($student->plan_name ?? 'Demo'); ?></td>
                            <td> <?php echo e($student->student_name ?? 'Demo'); ?></td>
                            <td>
                                <span class="badge 
                                    <?php if($student->status == 'checked'): ?> bg-success 
                                    <?php elseif($student->status == 'pending' || $student->status == 'assigned'): ?> bg-danger 
                                    <?php endif; ?>">
                                    
                                    <?php if($student->status == 'assigned' || $student->status == 'pending'): ?>
                                        Pending
                                    <?php else: ?>
                                        <?php echo e(ucfirst($student->status)); ?>

                                    <?php endif; ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?php echo e(route('student.answerEdit',$student->id)); ?>">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo e(route('evaluate.delete', $student->id)); ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/evaluate/studentanswerlist.blade.php ENDPATH**/ ?>