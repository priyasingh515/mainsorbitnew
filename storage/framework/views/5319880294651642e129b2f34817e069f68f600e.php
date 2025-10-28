
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
                <main class="col-md-9 col-lg-9 justify-content-center align-items-center">
                    
                    <div class="col-md-10 mt-5 col-lg-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h1 style="margin-left: 26px">Submit Answer</h1>
                        </div>
                        <form action="<?php echo e(route('user.answerstore')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="paper_type">Paper Type</label>
                                        <select name="paper_type_id" id="paper_type" class="form-control" required>
                                            <option value="">Select Paper Type</option>
                                            <?php $__currentLoopData = $papers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->paper_type_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label for="question_no">No. of question</label>
                                        <input type="number" class="form-control" name="question_no" min="1" placeholder="Add No Of question">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Answer Sheet</label>
                                        <input type="file" class="form-control" name="answer_sheet" required>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit Answer</button>
                        </form>
                    </div>
        
                  
                    <div class="col-md-10 mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 style="margin-left: 26px">Submitted Answers</h5>
                            <a href="<?php echo e(url('/answerList')); ?>" class="btn btn-primary">View All</a>
                        </div>
                        
                        

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Paper Type</th>
                                        <th> no. of questions</th>
                                        <th>Answer Sheet</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td><?php echo e($answer->paper_type_name ?? 'N/A'); ?></td>
                                            <td><?php echo e($answer->question_no ?? 'N/A'); ?></td>
                                            <td>
                                                <a href="<?php echo e(asset('public/'.$answer->answer_pdf)); ?>" target="_blank">
                                                    View Answer Sheet
                                                </a>
                                            </td>
                                            
                                            <td>
                                                <span class="badge 
                                                    <?php if($answer->status === 'checked'): ?> bg-success 
                                                    <?php elseif($answer->status === 'pending' || $answer->status === 'assigned'): ?> bg-danger 
                                                    <?php endif; ?>">
                                                    <?php echo e($answer->status === 'assigned' ? 'Pending' : ucfirst($answer->status)); ?>

                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
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
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1418939.cloudwaysapps.com/npgmynvhtn/public_html/resources/views/front/user/anseraddform.blade.php ENDPATH**/ ?>