

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Question Paper</h1>
            </div>
           
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
   
    <div class="container-fluid">
        <form  method="POST" action="<?php echo e(route('question.update', $questions->id)); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="state">State</label>
                                <select name="state" id="state" class="form-control" onchange="toggleYearField()">
                                    <option value="">Select</option>
                                    <option value="cg" <?php echo e(($questions->state ?? '') == 'cg' ? 'selected' : ''); ?>>CG</option>
                                    <option value="mp" <?php echo e(($questions->state ?? '') == 'mp' ? 'selected' : ''); ?>>MP</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="paper_type">Paper Type</label>
                                <select name="paper_type" id="paper_type" class="form-control">
                                    <option value="">Select Paper Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="paper_type">Subject Type</label>
                                <select name="subject_type" id="subject" class="form-control">
                                    <option value="">Select Subject Type</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 part-section">
                            <div class="mb-3">
                                <label for="part">Part</label>
                                <select name="part" id="part" class="form-control">
                                    <option value="">Select Part</option>
                                    <option value="a">Part A</option>
                                    <option value="b">Part B</option>
                                </select>
                            </div>
                        </div>
                       
    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="file">Upload PDF</label>
                                <input type="file" name="file" id="file" value="<?php echo e($questions->pdf_path); ?>" class="form-control" accept="application/pdf">
                                <?php if($questions->pdf_path): ?> 
                                <a href="<?php echo e(url('admin/pdfs/' . basename($questions->pdf_path))); ?>" target="_blank">View PDF</a>
                                <?php else: ?>
                                    No PDF
                                <?php endif; ?>
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
    
    
    
    
    <!-- /.card -->
</section>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('customJs'); ?>

<!-- SweetAlert2 Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<script>
    $(document).ready(function () {
        var selectedState = "<?php echo e($questions->state ?? ''); ?>";
        var selectedPaperType = "<?php echo e($questions->paper_type ?? ''); ?>";
        var selectedSubject = "<?php echo e($questions->subject_type ?? ''); ?>";

        function loadPaperTypes(state, selectedPaperType) {
            if (state) {
                $.ajax({
                    url: '/admin/get_paper',
                    type: 'GET',
                    data: { state: state },
                    success: function (data) {
                        $('#paper_type').html('<option value="">Select Paper Type</option>');
                        $.each(data, function (key, value) {
                            var selected = (value.id == selectedPaperType) ? 'selected' : '';
                            $('#paper_type').append('<option value="' + value.id + '" ' + selected + '>' + value.paper_type_name + '</option>');
                        });

                        // Agar edit mode hai to subjects load kare
                        if (selectedPaperType) {
                            loadSubjects(selectedPaperType, selectedSubject);
                        }
                    }
                });
            } else {
                $('#paper_type').html('<option value="">Select Paper Type</option>');
                $('#subject').html('<option value="">Select Subject</option>'); 
            }
        }

        function loadSubjects(paperTypeId, selectedSubject) {
            if (paperTypeId) {
                $.ajax({
                    url: '/admin/get_subjects',
                    type: 'GET',
                    data: { paper_type_id: paperTypeId },
                    success: function (data) {
                        $('#subject').html('<option value="">Select Subject</option>');
                        $.each(data, function (key, value) {
                            var selected = (value.id == selectedSubject) ? 'selected' : '';
                            $('#subject').append('<option value="' + value.id + '" ' + selected + '>' + value.subject_name + '</option>');
                        });
                    }
                });
            } else {
                $('#subject').html('<option value="">Select Subject</option>');
            }
        }

        // State Change Event
        $('#state').on('change', function () {
            var state = $(this).val();
            loadPaperTypes(state, '');
        });

        // Paper Type Change Event
        $('#paper_type').on('change', function () {
            var paperTypeId = $(this).val();
            loadSubjects(paperTypeId, '');
        });

        // Page Load -> Edit Mode Data Load
        if (selectedState) {
            loadPaperTypes(selectedState, selectedPaperType);
        }
    });
</script>
    
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/questions/edit.blade.php ENDPATH**/ ?>