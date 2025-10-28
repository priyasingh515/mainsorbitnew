

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
                <h1>Mains Practice Question</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="<?php echo e(route('mains.create')); ?>" class="btn btn-primary">Add Mains Practice Question</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  
    <div class="container-fluid">
        <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card">
            
            <div class="card-body table-responsive p-0 mt-2">								
                <table class="table table-hover text-nowrap datatable">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Paper Type</th>
                            <th>Subject Type</th>
                            <th>PDF</th>
                            <th>Date</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i =1;?>
                        <?php $__currentLoopData = $mainsPractice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mains): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td>
                                <?php echo e($mains->paper_type_name); ?>

                            </td>
                            <td>
                                <?php echo e($mains->subject_name); ?>

                            </td>
                            <td>
                                

                                <?php if(!empty($mains->mains_file) && is_string($mains->mains_file)): ?>
                                    <a href="<?php echo e(url('public/'.$mains->mains_file)); ?>" target="_blank">
                                        <img src="<?php echo e(asset('/public/assets/front/img/logos/pd.png')); ?>" alt="Answer Pdf" height="50" width="50">
                                    </a>
                                <?php else: ?>
                                    <span>No PDF</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(\Carbon\Carbon::parse($mains->created_at)->format('d F Y')); ?></td>

                            <td>
                                <a href="<?php echo e(route('mains.edit',$mains->id)); ?>">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="<?php echo e(route('mains.delete', $mains->id)); ?>" class="text-danger" onclick="return confirm('Are you sure you want to delete this?');">
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/admin/mains/cgquestion.blade.php ENDPATH**/ ?>