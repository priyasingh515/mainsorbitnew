

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Student Doubt List</h1>
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
                            <th>Name</th>
                            <th>Email</th>
                            
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php $__currentLoopData = $studentsWithDoubts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($dout->name ?? 'Demo'); ?></td>
                            <td> <?php echo e($dout->email); ?></td>
                            <td>
                                <a href="<?php echo e(route('Doubtlist.index', $dout->id)); ?>" class="btn btn-primary">
                                  View Student Doubt
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
                <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="viewModalLabel">View</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body" id="modalContent">
                          <!-- Content will be inserted here via JS -->
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
    const viewModal = document.getElementById('viewModal');
    viewModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const content = button.getAttribute('data-content');
        const title = button.getAttribute('data-title');

        const modalBody = viewModal.querySelector('.modal-body');
        const modalTitle = viewModal.querySelector('.modal-title');

        modalBody.textContent = content;
        modalTitle.textContent = title;
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>
    <!-- DataTables Core + Bootstrap Integration -->
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/admin/doubtstudent.blade.php ENDPATH**/ ?>