
<?php $__env->startSection('title','Mains practice Question paper'); ?>
<?php $__env->startSection('content'); ?>

        <style>
            .blinking {
            animation: blinker 1s linear infinite;
        }
        @keyframes  blinker {
            50% { opacity: 0; }
        }

       
        </style>
        <section class="py-5 bg-light" style="height: auto">
            <div class="container">
                <h2 class="text-center mb-4 fw-bold">Mains Practice Question</h2>

                <div class="accordion" id="papersAccordion">
                    <?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paperType => $subjects): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo e(Str::slug($paperType)); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e(Str::slug($paperType)); ?>">
                                    <?php echo e($paperType); ?>

                                </button>
                            </h2>
                            <div id="collapse<?php echo e(Str::slug($paperType)); ?>" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <ul class="list-group scrollable-list">
                                        
                                        <?php
                                            $hasSubjects = $subjects->whereNotNull('subject_name')->count() > 0;
                                        ?>
        
                                        <?php if($hasSubjects): ?>
                                            
                                            <?php $__currentLoopData = $subjects->whereNotNull('subject_name')->sortBy('subject_name')->groupBy('subject_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subjectType => $pdfs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="list-group-item">
                                                    <a href="javascript:void(0);" onclick="togglePDFs('pdfList<?php echo e(Str::slug($paperType)); ?>-<?php echo e(Str::slug($subjectType)); ?>')">
                                                        <?php echo e($subjectType); ?>

                                                    </a>
                                                    <ul class="list-group mt-2 d-none scrollable-list" id="pdfList<?php echo e(Str::slug($paperType)); ?>-<?php echo e(Str::slug($subjectType)); ?>">
                                                        <?php $__currentLoopData = $pdfs->sortByDesc('created_at')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <?php if(Auth::check()): ?>
                                                                    <a href="<?php echo e(url('public/'.$pdf->mains_file)); ?>" target="_blank">View PDF</a>
                                                                <?php else: ?>
                                                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                        Login to view PDF
                                                                    </a>
                                                                <?php endif; ?>
                                                                <?php if($index === 0): ?>
                                                                    <span class="badge bg-danger blinking">New</span>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
        
                                        
                                        <?php $__currentLoopData = $subjects->whereNull('subject_name')->sortByDesc('created_at')->values(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php if(Auth::check()): ?>
                                                    <a href="<?php echo e(url('public/'.$pdf->mains_file)); ?>" target="_blank">View PDF</a>
                                                <?php else: ?>
                                                    <a href="javascript:void(0);" class="text-danger" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                        Login to view PDF
                                                    </a>
                                                <?php endif; ?>
                                                <?php if($index === 0): ?>
                                                    <span class="badge bg-danger blinking">New</span>
                                                <?php endif; ?>
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

        <script>
            setTimeout(() => {
                const element = document.querySelectorAll('.submenu-button')[1];
                element.style.display = 'none';
            }, 1000); 
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/front/user/mainspractice.blade.php ENDPATH**/ ?>