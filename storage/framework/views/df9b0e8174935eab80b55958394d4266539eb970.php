



<?php $__env->startSection('title','User Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<style>
    /* Sidebar Responsive Fix */
    .sidebar {
        background: #ebebeb57;
        color: white;
        padding: 20px;
        height: 100vh;
    }

    @media (max-width: 768px) {
        .sidebar {
            display: block !important;
            width: 100%;
            padding: 15px;
            height: auto;
        }
    }

    /* Main Content Fix */
    main {
        min-height: 100vh !important;
        height: auto !important;
    }

    /* Card Responsive Fix */
    @media (max-width: 768px) {
        .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }

    /* Page Title Section */
    .page-title-section {
        padding: 9px 0 90px;
    }

    /* Pagination Fix */
    .pagination {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .pagination .page-link {
        font-size: 14px;
        padding: 6px 12px;
        color: #007bff;
        border-radius: 50px;
        margin: 0 5px;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
    }
    .card:hover {
        border: 2px solid orange;
        color: white;
        transition: 0.3s ease;
    }
</style>


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-3 sidebar d-none d-lg-block">
            <?php if(Auth::user()->name): ?>
                <h4 style="font-size: 12px">Name: <?php echo e(Auth::user()->name); ?></h4>
            <?php else: ?>
                <h4 style="font-size: 12px">Email: <?php echo e(Auth::user()->email); ?></h4>
            <?php endif; ?>
            
            <ul class="list-group">
                
                <li class="list-group-item">
                    <a href="<?php echo e(route('user.answerForm')); ?>" class="text-decoration-none">📝 Submit Answer</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(url('/answerList')); ?>" class="text-decoration-none">📂 My Answers</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(route('user.msg')); ?>" class="text-decoration-none">💬 Doubt Messages</a>
                </li>
                <li class="list-group-item">
                    <a href="<?php echo e(route('user.count')); ?>" class="text-decoration-none">📊 Your Report</a>
                </li>
                <?php if(auth()->check() && $hasPlan): ?>
                    <li class="list-group-item">
                        <a href="<?php echo e(url('current_affair')); ?>" class="text-decoration-none">📰 Monthly Current Affairs</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-9 d-flex flex-column">
            <h1>My Answer</h1>
            <div class="container mt-5">
                <div class="row">
                    <?php $__currentLoopData = $paperTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <a href="<?php echo e(route('user.viewCheckedSheet', $answer->id)); ?>">
                                <div class="card shadow" style="height: 100px">
                                    <div class="card-body">
                                        <h5 class="mt-2"><?php echo e($answer->paper_type_name ?? 'N/A'); ?></h5>
                                    </div>
                                    
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    setTimeout(() => {
        const element = document.querySelectorAll('.submenu-button')[1];
        element.style.display = 'none';
    }, 1000); 
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/front/user/allanswer.blade.php ENDPATH**/ ?>