
<?php $__env->startSection('title','About'); ?>
<?php $__env->startSection('content'); ?>

    <style>
        .page-title-section{
            padding: 9px 0 90px
        }

        @media (max-width: 576px) {
                .about-img img{
                    max-width: 100% !important;
                }
            }
    </style>

    <?php $__currentLoopData = $about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $abouts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
        <?php if($index == 0): ?>
            <section class="aboutus-style-02 bg-light">
                <div class="container">
                    <div class="row align-items-center mt-n1-9">
                        <div class="col-lg-6 col-xl-7 mt-1-9">
                            <div class="text-lg-center position-relative">
                                <div class="about-img">
                                    <img src="<?php echo e(asset('/public/assets/front/img/about.jpg')); ?>" alt="..."  class="position-relative z-index-1" style="max-width: 80%">
                                </div>
                                <img src="<?php echo e(asset('/public/assets/front/img/bg/bg-07.png')); ?>" class="bg-shape1 d-none d-lg-inline-block" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 mt-1-9">
                        
                            <h2 class="h1 mb-1-6 text-primary"><?php echo e($abouts->title); ?></h2>
                            <p>
                                <?php echo e($abouts->content); ?>

                            </p>
                          
                        </div>
                    </div>
                    <div class="shape20">
                        <img src="<?php echo e(asset('/public/assets/front/img/bg/bg-02.jpg')); ?>" alt="...">
                    </div>
                    <div class="shape18">
                        <img src="<?php echo e(asset('/public/assets/front/img/bg/bg-01.jpg')); ?>" alt="...">
                    </div>
                    <div class="shape21">
                        <img src="<?php echo e(asset('/public/assets/front/img/bg/bg-03.jpg')); ?>" alt="...">
                    </div>
                </div>
            </section>
        <?php endif; ?>
       
        <?php if($index == 1): ?>
            <section class="py-0">
                <div class="row g-0">
                    <div class="col-lg-12 order-2 order-lg-1">
                        <div class="instructor-content">
                            <h2 class="h2 mb-3"><?php echo e($abouts->title); ?></h2>
                            <p class=""><?php echo $abouts->content; ?></p>
                        </div>
                    </div>
                
                </div>
               
            </section>
        <?php endif; ?>

        <?php if($index == 2): ?>
            <section class="py-0">
                <div class="row g-0">
                    <div class="col-lg-12 order-2 order-lg-1">
                        <div class="instructor-content">
                            <h2 class="h2 mb-3"><?php echo e($abouts->title); ?></h2>
                            <p class=""><?php echo $abouts->content; ?></p>
                        </div>
                    </div>
                    
                </div>
            </section>
        <?php endif; ?>

        <?php if($index == 3): ?>
            <section class="py-0">
                <div class="row g-0">
                    <div class="col-lg-12 order-2 order-lg-1">
                        <div class="instructor-content">
                            <h2 class="h2 mb-3"><?php echo e($abouts->title); ?></h2>
                            <p class=""><?php echo $abouts->content; ?></p>
                        </div>
                    </div>
                   
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/front/aboutus.blade.php ENDPATH**/ ?>