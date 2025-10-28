

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Evaluate</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo e(route('evaluate.index')); ?>" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form  method="POST" action="<?php echo e(route('evaluate.update',$evaluate->id)); ?>">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Title</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Title" value="<?php echo e($evaluate->name); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Content</label>
                                <input type="text" name="email"  class="form-control" value="<?php echo e($evaluate->email); ?>" placeholder="Enter content">
                            </div>
                        </div>
    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" value="" placeholder="Enter Password">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="evaluate">Select</label>
                                <select name="evaluate" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="3" <?php echo e($evaluate->role == 3 ? 'selected' : ''); ?>>Evaluate</option>
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" class="form-control" value="<?php echo e($evaluate->subject); ?>" placeholder="Enter Your Subject">
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/evaluate/edit.blade.php ENDPATH**/ ?>