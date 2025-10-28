
<?php $__env->startSection('title', 'User Dashboard'); ?>
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

        .page-title-section {
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
                    <?php if(auth()->check() && $hasPlan): ?>
                        <li class="list-group-item">
                            <a href="<?php echo e(url('current_affair')); ?>" class="text-decoration-none">📰 Monthly Current Affairs</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>


            <main class="col-md-9 col-lg-9 d-flex flex-column">

                
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4 mb-4">
                            <a href="<?php echo e(url('answerList')); ?>" class="text-decoration-none">
                                <div class="card shadow-lg border border-warning rounded-3 bg-light text-center py-2">
                                    <div class="card-body">
                                        <h6 class="text-muted text-uppercase fw-light">Total Submitted Answers</h6>
                                        <h2 class="fw-bold text-primary"><?php echo e($totalSubmitted); ?></h2>
                                        <!-- 🔵 Count Focused -->
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <a href="<?php echo e(url('CheckAnsList')); ?>" class="text-decoration-none">
                                <div class="card shadow-lg border border-warning rounded-3 bg-light text-center py-2">
                                    <div class="card-body">
                                        <h6 class="text-muted text-uppercase fw-light">Total Evaluated Answers</h6>
                                        <h2 class="fw-bold text-success"><?php echo e($totalEvaluated); ?></h2>
                                        <!-- 🟢 Count Focused -->
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-4">
                            <a href="<?php echo e(url('pendingAnsList')); ?>" class="text-decoration-none">
                                <div class="card shadow-lg border border-warning rounded-3 bg-light text-center py-2">
                                    <div class="card-body">
                                        <h6 class="text-muted text-uppercase fw-light">Total Pending Answers</h6>
                                        <h2 class="fw-bold text-danger"><?php echo e($totalPending); ?></h2> <!-- 🔴 Count Focused -->
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
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
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/front/user/usercount.blade.php ENDPATH**/ ?>