

<?php $__env->startSection('content'); ?>
<section class="content-header">					
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <?php
        $user = Auth::guard('admin')->user();

        $studentsList = DB::table('assigned_teacher')
            ->join('answer_sheets', 'assigned_teacher.answersheet_id', '=', 'answer_sheets.id')
            ->join('users', 'answer_sheets.student_id', '=', 'users.id')
            ->where('assigned_teacher.teacher_id', auth()->id())
            ->where('answer_sheets.status','assigned')
            ->select(
                'assigned_teacher.*', 
                'answer_sheets.answer_pdf', 
                'answer_sheets.status', 
                'users.name as student_name', 
                'users.email as student_email'
            )
            ->count();

            $totalEnquiries = DB::table('enqueries')->count();

            $totalcg = DB::table('users')
                ->where('role', 1)
                ->where('state', 'CG')
                ->count();
                
            $totalmp = DB::table('users')
                ->where('role', 1)
                ->where('state', 'MP')
                ->count();

    ?>
    
   
    <div class="container-fluid">
        <div class="row">
            <?php if($user && $user->role == 2): ?> 
                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($totalEnquiries); ?></h3>
                            <p>Total Enquiry</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('enquerylist.index')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($totalcg); ?></h3>
                            <p>CG Registered Student</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo e(route('cglogin.student')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($totalmp); ?></h3>
                            <p>MP Registered Student</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo e(route('mplogin.student')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($activePlansCount); ?></h3>
                            <p>Plan Purchase Sutudent</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo e(route('plan.purchase')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>
            <?php endif; ?>

            <?php if($user && $user->role == 3): ?> 
                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($studentsList); ?></h3>
                            <p>Assigned Answer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('studentassign.list')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($checkedStudents); ?></h3>
                            <p>Evaluated Answer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('studentAssign.list')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">							
                    <div class="small-box card">
                        <div class="inner">
                            <h3><?php echo e($doubtsCount); ?></h3>
                            <p> Doubt Messages</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo e(route('studentdoubt.list')); ?>" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>					
    <!-- /.card -->
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customJs'); ?>
  

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\priyanka\mainsorbitnew\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>