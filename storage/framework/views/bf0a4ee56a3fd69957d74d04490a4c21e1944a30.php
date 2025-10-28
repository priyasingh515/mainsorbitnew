

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Teacher Assigned</h1>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   
    <div class="container-fluid">
        <form  method="POST" action="<?php echo e(route('student.assign',$answerSheet->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="assigned">Assigned</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file">Teacher</label>
                                <?php
                                    $teachers = DB::table('users')
                                        ->join('teacher_states', 'users.id', '=', 'teacher_states.user_id')
                                        ->where('users.role', 3)
                                        ->where('teacher_states.state', $type)
                                        ->select('users.id', 'users.name')
                                        ->get();
                                ?>
                                <select name="teacher_id" id="teacher" class="form-control">
                                    <option value="">Select</option>
                                    <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Answer Pdf</label>
                                <input type="hidden" name="answer_sheet_id" id="name" value="<?php echo e($answerSheet->id); ?>" class="form-control" placeholder="Enter Name">
                                <a href="<?php echo e(url($answerSheet->answer_pdf)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/pdf_img/pdficons.jpg')); ?>" alt="Answer Pdf" height="100" width="100">
                                </a>
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
    
    
    
    
    <!-- /.card -->
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/student/answeredit.blade.php ENDPATH**/ ?>