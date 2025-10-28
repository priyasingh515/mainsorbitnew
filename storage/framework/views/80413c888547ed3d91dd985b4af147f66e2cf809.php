

<?php $__env->startSection('content'); ?>

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Message</h1>
            </div>
            <div class="col-sm-6 text-right">
                
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
                            <th>Username</th>
                            
                            <th>Answer Sheet</th>
                            <th>Checked Sheet</th>
                            <th>Doubt file</th>
                            <th>Resolve file</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php $__currentLoopData = $Message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($student->student_name ?? 'Demo'); ?></td>
                            
                            <td>
                                <a href="<?php echo e(url('public/'.$student->answer_sheet)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(url('public/'.$student->check_file)); ?>" target="_blank">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                </a>
                            </td>
                            <td>
                                <?php if($student->doubt_file): ?>
                                    <a href="<?php echo e(asset('public/'.$student->doubt_file)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Doubt File" height="50" width="50">
                                    </a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($student->resolve_file): ?>
                                    <a href="<?php echo e(asset('public/'.$student->resolve_file)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="Doubt File" height="50" width="50">
                                    </a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td>
                                
                                <a href="javascript:void(0);" 
                                    class="btn btn-primary btn-sm view-description" 
                                    data-description="<?php echo e($student->description); ?>"
                                    data-reply="<?php echo e($student->reply ?? ''); ?>">
                                    View
                                </a>
                            </td>
                            <td>
                                <span class="badge 
                                    <?php if($student->status == 'active'): ?> bg-success 
                                    <?php else: ?> bg-danger 
                                    <?php endif; ?>">
                                    <?php echo e($student->status == 'active' ? 'Replied' : 'Pending'); ?>

                                </span>
                            </td>
                            
                            <td>
                                <a href="javascript:void(0);" class="edit-status" data-id="<?php echo e($student->id); ?>" data-status="<?php echo e($student->description); ?>">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descriptionModalLabel">Doubt & Reply</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Doubt:</strong></p>
                                    <p id="modal-description"></p>
                                    <hr>
                                    <p><strong>Reply:</strong></p>
                                    <p id="modal-reply"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editStatusModalLabel">Edit Reply Message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form id="updateStatusForm" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" id="doubtId" name="doubt_id">
                                    
                                        <label for="status">Student Message</label>
                                        <textarea class="form-control" id="currentStatus" cols="30" rows="3" disabled></textarea>
                                    
                                        <label for="newStatus" class="mt-2">Your Reply</label>
                                        <textarea class="form-control" id="newStatus" name="reply" cols="30" rows="5" required></textarea>
                                    
                                        <label class="mt-2">Attach Resolve File (optional)</label>
                                        <input type="file" name="resolve_file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                                    
                                        <div class="mt-3">
                                            <button type="submit" id="submitButton" class="btn btn-primary">
                                                <span class="spinner-border spinner-border-sm d-none me-2" role="status" aria-hidden="true"></span>
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>										
            </div>
          
        </div>
    </div>
    <!-- /.card -->
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.view-description').click(function(){
            let description = $(this).data('description');
            let reply = $(this).data('reply');

            $('#modal-description').text(description);
            $('#modal-reply').text(reply ? reply : 'No reply yet.');

            $('#descriptionModal').modal('show');
        });
    });
    
</script>

<script>
    $(document).ready(function() {
        // Open modal and set data
        $(".edit-status").click(function() {
            let doubtId = $(this).data("id");
            let currentStatus = $(this).data("status");

            $("#doubtId").val(doubtId);
            $("#currentStatus").val(currentStatus);
            $("#newStatus").val(""); 
            $("#editStatusModal").modal("show");
        });

        // AJAX Form Submit
        $('#updateStatusForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);
            let submitButton = $('#submitButton');
            let spinner = submitButton.find('.spinner-border');

            // Disable and show spinner
            submitButton.prop('disabled', true);
            spinner.removeClass('d-none');

            $.ajax({
                url: "/admin/send-reply",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    alert(response.success);
                    location.reload(); // Page reload hone par button wapas normal ho jayega
                },
                error: function (xhr) {
                    // Enable again on error
                    submitButton.prop('disabled', false);
                    spinner.addClass('d-none');

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        alert(Object.values(xhr.responseJSON.errors).join('\n'));
                    } else {
                        alert('Something went wrong.');
                    }
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/evaluate/message.blade.php ENDPATH**/ ?>