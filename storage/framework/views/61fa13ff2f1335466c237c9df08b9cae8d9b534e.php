<style>
    .sidebar-scroll {
        max-height: calc(100vh - 100px); /* sidebar height minus header area */
        overflow-y: auto;
        overflow-x: hidden;
        scrollbar-width: thin; /* for firefox */
    }

    /* Optional: better look for scrollbar */
    .sidebar-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .sidebar-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }
    .sidebar-scroll::-webkit-scrollbar-thumb:hover {
        background-color: rgba(255, 255, 255, 0.4);
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4"style="position: fixed; top: 0; left: 0; height: 100vh; overflow-y: auto; z-index: 999;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?php echo e(asset('/assets/admin/img/mainsorbit.png')); ?>" alt=" Logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-light">Mains Orbit</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2 sidebar-scroll">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>																
                </li>
               
                <?php
                    $user = Auth::guard('admin')->user();
                ?>

                <?php if($user && $user->role == 3): ?> 
                    <li class="nav-item">
                        <a href="<?php echo e(route('studentassign.list')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Assigned Answer</p>
                        </a>																
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('studentAssign.list')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Evaluated Answer</p>
                        </a>															
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('studentdoubt.list')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Doubt Messages</p>
                        </a>																
                    </li>
                <?php endif; ?>

                <?php if($user && $user->role != 3): ?> 
                    
                    <li class="nav-item has-treeview">
                        <a href="<?php echo e(route('evaluate.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Evaluator
                            
                            </p>
                        </a>
                        
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('enquerylist.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Enquiry List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.doubt.students')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Student Doubt</p>
                        </a>
                    </li>

                    
                    
                    

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Plans
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('plan.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('plan.purchase')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan Purchase Student</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('plan.pending')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Plan Pending Student</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('student.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p> CG Student
                                
                            </p>
                        </a>

                        
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('student.mpstudentList')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p> MP Student
                                
                            </p>
                        </a>
                        
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('slider.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Slider</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('about.index')); ?>" class="nav-link">
                            <svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p>About</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('sample.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Add Sample</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Mains Practice question
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('mpmainspractice.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MP Mains Question</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('cgmainspractice.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CG Mains Question</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo e(route('weekly.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Monthly Current affairs</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Previous Year Questions
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('mpquestion.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MP PYQ</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('cgquestion.index')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CG PYQ</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('guide.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Supporter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('offer.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Offers</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(route('setting.index')); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Web Settings</p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Login Student
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('cglogin.student')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CG Student</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('mplogin.student')); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MP Student</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                
                							
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>