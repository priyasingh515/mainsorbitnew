

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<style>
    .table td, .table th {
    white-space: normal !important;
    word-wrap: break-word;
}
</style>
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Plan Purchase Student</h1>
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
                            <th>User name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Plan name</th>
                            <th>price</th>
                            <th>Purchase  date</th>
                            <th>plan expire date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i =1;?>
                        <?php $__currentLoopData = $purchasePlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($plan->user_name); ?></td>
                            <td><?php echo e($plan->mobile); ?></td>
                            <td><?php echo e($plan->email); ?></td>
                            <td><?php echo e($plan->state); ?></td>
                            <td><?php echo e($plan->district); ?></td>
                            <td> <?php echo e($plan->plan_name); ?></td>
                            <td> <?php echo e($plan->price); ?></td>
                            <td> <?php echo e($plan->purchase_date); ?></td>
                            <td> <?php echo e($plan->expiry_date); ?></td>
                            <td> 
                                <?php if($plan->status == 'pending'): ?>
                                    <span class="badge bg-danger text-white px-3 py-1 rounded-pill"><?php echo e($plan->status); ?></span>
                                <?php elseif($plan->status == 'active'): ?>
                                    <span class="badge bg-success text-white px-3 py-1 rounded-pill"><?php echo e($plan->status); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark px-3 py-1 rounded-pill"><?php echo e($plan->status); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('purchaseplan.delete', $plan->id)); ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/admin/Plans/purchase_list.blade.php ENDPATH**/ ?>