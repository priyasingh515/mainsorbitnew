
<?php $__env->startSection('title','User Dashboard'); ?>
<?php $__env->startSection('content'); ?>


<style>
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
        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .page-title-section{
            padding: 9px 0 90px
        }

        @media (max-width: 768px) {
            .table-responsive {
                width: 100% !important;
                max-width: 100%;
                overflow-x: auto !important;
                padding: 0 10px;
            }
            .table {
                margin-left: 0 !important;
                margin-right: auto !important;
            }

            main {
                align-items: flex-start !important;
            }
        }

</style>




        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav class="col-md-3 col-lg-3 sidebar d-none d-md-block">
                    <?php if(Auth::user()->name): ?>
                        <h4 style="font-size: 12px">Name: <?php echo e(Auth::user()->name); ?></h4>
                    <?php else: ?>
                        <h4 style="font-size: 12px">Email: <?php echo e(Auth::user()->email); ?></h4>
                    <?php endif; ?>
                    <?php if($activePlan): ?>
                        <div class="alert alert-info">
                            <strong>Plan Details:</strong><br>
                            <b>Plan Name:</b> <?php echo e($activePlan->name); ?><br>
                            <b>Purchase Date:</b> <?php echo e(date('d M, Y', strtotime($activePlan->purchase_date))); ?><br>
                            <b>Expiry Date:</b> <?php echo e(date('d M, Y', strtotime($activePlan->expiry_date))); ?>

                        </div>
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
                        <li class="list-group-item">
                            <a href="<?php echo e(route('profile')); ?>" class="text-decoration-none">👤 My Profile</a>
                        </li>
                        <?php if(auth()->check() && $hasPlan): ?>
                            <li class="list-group-item">
                                <a href="<?php echo e(url('current_affair')); ?>" class="text-decoration-none">📰 Monthly Current Affairs</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
        
                <main class="col-md-9 col-lg-9 justify-content-center align-items-center">

                    <div class="col-md-10 mt-5 col-lg-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 class="ms-4">Profile Details</h1>
                        </div>

                        
                        <div class="card shadow-sm border-0 rounded-3 mx-4 mb-4">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-1"><i class="fas fa-user me-1"></i> Name</h6>
                                        <p class="fs-5 fw-semibold"><?php echo e(Auth::user()->name ?? 'Demo'); ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-1"><i class="fas fa-envelope me-1"></i> Email</h6>
                                        <p class="fs-5 fw-semibold"><?php echo e(Auth::user()->email ?? 'Demo'); ?></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-1"><i class="fas fa-phone me-1"></i> Phone</h6>
                                        <p class="fs-5 fw-semibold"><?php echo e(Auth::user()->phone ?? 'Demo'); ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="text-muted mb-1"><i class="fas fa-map-marker-alt me-1"></i> State</h6>
                                        <p class="fs-5 fw-semibold"><?php echo e($districtName ?? 'Demo'); ?></p>
                                    </div>
                                </div>

                                
                            </div>
                        </div>

                        
                        <?php if($activePlan): ?>
                            <div class="card shadow-sm border-0 rounded-3 mx-4 bg-light">
                                <div class="card-body">
                                    <h5 class="mb-3"><i class="bi bi-card-checklist me-2"></i> Active Plan Details</h5>
                                    <p class="mb-1"><strong>Plan Name:</strong> <?php echo e($activePlan->name); ?></p>
                                    <p class="mb-1"><strong>Purchase Date:</strong> <?php echo e(date('d M, Y', strtotime($activePlan->purchase_date))); ?></p>
                                    <p class="mb-1"><strong>Expiry Date:</strong> <?php echo e(date('d M, Y', strtotime($activePlan->expiry_date))); ?></p>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning mx-4">
                                You don't have any active plan currently.
                            </div>
                        <?php endif; ?>

                    </div>

                </main>
            </div>
        </div>

        

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#paper_type').on('change', function () {
                    var paperId = $(this).val();
        
                    if (paperId) {
                        $.ajax({
                            url: '/get-subjects/' + paperId,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $('#subject').empty().append('<option value="">Select Subject</option>');
        
                                $.each(data, function (key, subject) {
                                    $('#subject').append('<option value="' + subject.id + '">' + subject.subject_name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#subject').empty().append('<option value="">Select Subject</option>');
                    }
                });
            });
        </script>
        <script>
            setTimeout(() => {
                const element = document.querySelectorAll('.submenu-button')[1];
                element.style.display = 'none';
            }, 1000); 
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/front/user/profile.blade.php ENDPATH**/ ?>