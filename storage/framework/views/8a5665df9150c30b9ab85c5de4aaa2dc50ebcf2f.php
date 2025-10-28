

<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Evaluated List</h1>
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
                            <th>Name</th>
                            
                            <th>No. of question</th>
                            <th>Submit answer</th>
                            <th>Assigned Date</th>
                            <th>checked answer</th>
                            <th>Checked date</th>
                            <th>Remark</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php $__currentLoopData = $checkedStudents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evaluates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($evaluates->student_name ?? 'Demo'); ?></td>
                            
                            <td><?php echo e($evaluates->question_no); ?></td>
                            <td>
                                <a href="<?php echo e(url('public/'.$evaluates->answer_pdf)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td><?php echo e(\Carbon\Carbon::parse($evaluates->assigned_date)->format('d-M-Y')); ?></td>

                            <td>
                                
                                <a href="<?php echo e(url('public/'.$evaluates->checked_file_path)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                </a>

                            </td>
                            <td><?php echo e(\Carbon\Carbon::parse($evaluates->check_date)->format('d-M-Y')); ?></td>

                            
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#remarkModal" data-message="<?php echo e($evaluates->remark); ?>">
                                    View
                                </button>
                            </td>
                            <td>
                                <span class="badge 
                                    <?php if($evaluates->status == 'checked'): ?> bg-success 
                                    <?php elseif($evaluates->status == 'pending'): ?> bg-danger 
                                    <?php endif; ?>">
                                    <?php echo e(ucfirst($evaluates->status)); ?>

                                </span>
                            </td>
                            
                            
                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                   
                </table>
                <div class="modal fade" id="remarkModal" tabindex="-1" aria-labelledby="remarkModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="messageContent">
                                <!-- Message content will appear here -->
                            </div>
                        </div>
                    </div>
                </div>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Wait for DOM to load
    document.addEventListener("DOMContentLoaded", function () {
        var messageModal = document.getElementById('remarkModal');

        messageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var message = button.getAttribute('data-message'); // Extract info from data-* attributes
            var modalBody = messageModal.querySelector('#messageContent');

            modalBody.textContent = message;
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/evaluate/checked_list.blade.php ENDPATH**/ ?>