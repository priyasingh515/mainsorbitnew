
<?php $__env->startSection('title','PYQ'); ?>
<?php $__env->startSection('content'); ?>


<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>



        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Previous Year Question paper</h2>
        
                <div class="accordion" id="papersAccordion">
                    <?php $__currentLoopData = $cgpyq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paperType => $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo e(Str::slug($paperType)); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e(Str::slug($paperType)); ?>">
                                    <?php echo e($paperType); ?>

                                    
                                </button>
                            </h2>
                            <div id="collapse<?php echo e(Str::slug($paperType)); ?>" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <?php $__currentLoopData = $subjects->sortBy('subject_name')->groupBy('subject_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectType => $pdfs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item">
                                                <a href="javascript:void(0);" onclick="togglePDFs('pdfList<?php echo e(Str::slug($paperType)); ?>-<?php echo e(Str::slug($subjectType)); ?>')">
                                                    <?php echo e($subjectType); ?>

                
                                                </a>
                                                <ul class="list-group mt-2 d-none" id="pdfList<?php echo e(Str::slug($paperType)); ?>-<?php echo e(Str::slug($subjectType)); ?>">
                                                    <?php $__currentLoopData = $pdfs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        <li class="list-group-item">
                                                            <?php if(Auth::check()): ?>
                                                                <a href="<?php echo e(url('public/'.$pdf->pdf_path)); ?>" target="_blank">View PDF</a>
                                                            <?php else: ?>
                                                                <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    Login to view PDF
                                                                </a>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
       
        <script>
            function togglePDFs(id) {
                let pdfList = document.getElementById(id);
                pdfList.classList.toggle("d-none");
            }
        </script>

      

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/front/cgpyq.blade.php ENDPATH**/ ?>