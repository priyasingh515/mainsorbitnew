

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Evaluate</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo e(route('studentassign.list')); ?>" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        
        <form  method="POST" action="<?php echo e(route('student.uploadCheckedSheet',$studentanswerList->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="answer_sheet_id" value="<?php echo e($studentanswerList->answersheet_id); ?>">
                            <div class="mb-3">
                                <label for="name">Check Answer upload</label>
                                <input type="file" name="checked_file" class="form-control" required>
                                <a href="<?php echo e(url('public/'.$studentanswerList->answer_pdf)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="100" width="100">
                                </a>
                            </div>
                        </div>
                        
                            
                                
                                <input type="hidden" name="email" value="<?php echo e($studentanswerList->student_email); ?>"  class="form-control" placeholder="Enter Email">
                            
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Remarks (Optional)</label>
                                
                                <textarea name="remark" class="form-control" id="remark" cols="30" rows="10" >

                                </textarea>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                
            </div>
        </form>
    </div>
</section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>

<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if(session('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "<?php echo e(session('success')); ?>",
            });
        <?php endif; ?>

        <?php if(session('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "<?php echo e(session('error')); ?>",
            });
        <?php endif; ?>

        <?php if($errors->any()): ?>
            let errorMessages = "";
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                errorMessages += "<?php echo e($error); ?>\n";
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                text: errorMessages,
            });
        <?php endif; ?>
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/evaluate/studentedit.blade.php ENDPATH**/ ?>