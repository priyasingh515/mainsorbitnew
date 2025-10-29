<!DOCTYPE html>
<html lang="en">

<head>
    <!-- metas -->
    <meta charset="utf-8" />
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="keywords" content="Mains Orbit" />
    <meta name="description" content="Mains Orbit" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- title  -->
    <title>Mains Orbit - <?php echo $__env->yieldContent('title'); ?></title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('./assets/admin/img/logomain.png')); ?>" />
    <link rel="apple-touch-icon" href="<?php echo e(asset('./assets/admin/img/logomain.png')); ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('./assets/admin/img/logomain.png')); ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('./assets/admin/img/logomain.png')); ?>" />

    <!-- plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/front/css/plugins.css')); ?>" />

    <link href="https://fonts.googleapis.com/css2?family=Gill+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- search css -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/front/search/search.css')); ?>" />

    <!-- quform css -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/front/quform/css/base.css')); ?>">

    <!-- core style css -->
    <link href="<?php echo e(asset('/assets/front/css/styles.css')); ?>" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>

    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js"></script>
    <link href="https://fonts.cdnfonts.com/css/gilroy" rel="stylesheet">


</head>



<style>
    .custom-background {
        background-size: contain !important;
        background-position: center center !important;
        background-repeat: no-repeat !important;
        min-height: 500px; 
    }

    .slider-fade1 {
        width: 100vw !important;
        max-width: 100%;
    }

    .slider-fade1 .item {
        width: 100vw !important;
        min-height: 600px;
        background-size: cover !important; 
        background-position: center center !important;
        background-repeat: no-repeat !important;
    }

    ul.list-unstyled {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.list-unstyled li a {
        font-size: 30px;
        color: #ffffff;
        transition: color 0.3s ease-in-out;
    }

    ul.list-unstyled li a:hover {
        color: #007bff;
    }

    .team-section {
        /* background: rgba(248, 249, 250); */
        background: #fefefe;

        color: white;
        padding: 0px -39px;
        min-height: 400px;
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        flex-wrap: wrap;
        justify-content: flex-end;
        
    }
    /* .team-section {
        background: rgba(248, 249, 250);
        color: white;
        padding: 20px 20px;
        min-height: 400px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
    } */

    .team-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
        max-width: 1100px;
        /* margin: auto; */
    }

    .team-container:only-child, 
    .team-container .team-member:only-child {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .team-member {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* background: #fefefe; */
        background: rgba(248, 249, 250);

        border-radius: 10px;
        border: 2px solid #e0dedeb0;
        padding: 20px;
        width: 250px;
        height: 250px;
        box-shadow: 4px 4px 10px 0 rgba(165, 155, 155, 0.56);
        position: relative;
        transition: border 0.3s ease; 
        border: 2px solid transparent;
    }

    .team-member:hover {
        border: 2px solid #ff7029;
    }


    /* ✅ Fixed Centering Issue for Single Member */
    .team-container.single-member {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .team-container.single-member .team-member {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .team-container.single-member .team-member img {
        left: 0;  /* Remove left offset */
        transform: translateX(0); /* Center align */
    }

    /* ✅ Updated Image Styling */
    .team-member img {
        width: 120px;
        height: 120px;
        border-radius: 10px;
        border: 2px solid rgba(248, 249, 250);
        object-fit: cover;
        position: relative;
        left: 38px;  /* Remove left offset */
        transform: translateX(0); /* Center align */
    }

    .team-member h3, 
    .team-member p {
        margin-top: 10px;
        text-align: center;
        font-size: 15px;
        color: white;
    }

    .slick-prev, .slick-next {
        background: #2c316f;
        border: none;
        color: white;
        font-size: 18px;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 1;
    }
    .slick-prev:hover, .slick-next:hover{
        background: #2c316f;
    }

    .slick-prev {
        left: -15px;
    }

    .slick-next {
        right: -15px;
    }

    .slick-slide {
        margin: 0 15px;
    }


    .team-container.single-member {
        max-width: 400px; 
        margin: auto; 
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .team-container.single-member .team-member {
        width: 100%;
        max-width: 320px;
    }


    @media  screen and (max-width: 768px) {
        .buy-theme {
            transition-timing-function: ease-in-out;
            transition-duration: .2s;
            position: fixed;
            top: 88%;
            right: -95px;
            z-index: 9999
        }
        .buy-theme a,
        .buy-whatsapp a,
        .buy-you a,
        .all-demo a {
            color: #232323;
            font-size: 10px;
            text-transform: uppercase;
            padding: 5px 10px;
            display: block;
            text-decoration: none;
            font-weight: 500
        }

        .buy-theme img {
            font-size: 36px;
            vertical-align: middle;
            position: relative;
            top: -1px;
            color: #fff
        }
        .team-section {
            background: #fefefe;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 43px 20px;
            min-height: 431px;
        }
        .team-container.single-member {
            max-width: 80%;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .team-container.single-member .team-member {
            width: 100%; 
            max-width: 280px; 
            padding: 15px; 
            text-align: center;
        }

        .team-container.single-member .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .team-container.single-member .team-member img {
            left: 0;  /* Remove left offset */
            transform: translateX(0); /* Center align */
        }

        .guide{
            margin-bottom:-8px;
        }

        .evaluate{
            font-size: 7px !important;
        }
        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            /* background: #fefefe; */
            background: rgba(248, 249, 250);
            border: 2px solid #e0dedeb0;
            border-radius: 10px;
            padding: 20px;
            width: 220px;
            height: 298px;
            box-shadow: 4px 4px 10px 0 rgba(165, 155, 155, 0.56);
            position: relative;
            transition: border 0.3s ease; 
            border: 2px solid transparent;
        }

        .team-member:hover {
            border: 2px solid #ff7029;
        }

        /* ✅ Updated Image Styling */
        .team-member img {
            width: 170px;
            height: 170px;
            border-radius: 10px;
            border: 2px solid rgba(248, 249, 250);
            object-fit: cover;
            position: relative;
            left: 65px;  
            transform: translateX(0); 
        }
    }
</style>
<style>

    .modal-header .btn-close {
        position: absolute;
        right: 1rem;
        top: 1rem;
        background: none;
        color: orange;
        opacity: 1;
        font-size: 1.2rem;
    }

    .modal-header .btn-close:hover {
        color: darkorange;
    }
    .modal-header {
        position: relative;
        justify-content: center;
        border-bottom: none;
    }

    .modal-header .btn-close {
        position: absolute;
        right: 1rem;
        top: 1rem;
    }
    .custom-modal-content {
        border: 2px solid #ff7029;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(255, 165, 0, 0.3);
        background-color: #fff;
        padding: 15px;
    }

    .modal-body {
        background-color: #fff7f0;
        border-radius: 10px;
        font-family: 'Segoe UI', sans-serif;
    }

    .loginb {
        background-color: white;
        border: 2px solid #ff7029;
        border-radius: 10px;
        transition: 0.3s;
        font-weight: bold;
    }

    .loginb:hover {
        background-color: #ff7029;
        color: white;
    }

    .or-divider {
        color: #ff7029;
        font-weight: bold;
    }

    hr {
        border-top: 1px solid #ff7029;
        margin: 10px 0;
    }

    select.form-control,
    textarea.form-control,
    input.form-control {
        border: 1px solid #ff7029;
        border-radius: 10px;
    }

     .btn-login {
        border-radius: 10px;
        background-color: #2c316f;
        color: #fff7f0;
        border: none;
        font-weight: bold;
    }

    .btn-login:hover:hover {
        background-color: #ff7029;
        color: #fff7f0;
    } 

    .navbar-nav li a:hover {
        color: #ff7029 !important;
    }
    .blinking {
        animation: blinker 1s linear infinite;
    }

    @keyframes  blinker {
        50% { opacity: 0; }
    }
</style>

<body>

    <div class="main-wrapper">

        <header class="header-style1 menu_area-light">

            <div class="navbar-default">

                <!-- start top search -->
                <div class="top-search bg-primary">
                    <div class="container">
                        <form class="search-form" action="" method="GET" accept-charset="utf-8">
                            <div class="input-group">
                                <span class="input-group-addon cursor-pointer">
                                    <button class="search-form_submit fas fa-search text-white" type="submit"></button>
                                </span>
                                <input type="text" class="search-form_input form-control" name="s" autocomplete="off" placeholder="Type & hit enter...">
                                <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- end top search -->

                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-12">
                            <div class="menu_area alt-font">
                                <nav class="navbar navbar-expand-lg navbar-light p-0 pb-0">
                                    <div class="navbar-header navbar-header-custom">
                                        <!-- start logo -->
                                        <a href="/" class="navbar-brand"><img id="logo" src="
                                            <?php echo e(asset('./assets/admin/img/mainsorbit.png')); ?>

                                            " alt="logo"/></a>
                                        <!-- end logo -->
                                    </div>

                                    <div class="navbar-toggler bg-primary"></div>

                                    <!-- start menu area -->
                                    <ul class="navbar-nav ms-auto" id="nav" style="display: none;">
                                        <li>
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->state == 'cg'): ?>
                                                    <a href="<?php echo e(url('/cghome')); ?>">Home</a>
                                                <?php elseif(Auth::user()->state == 'mp'): ?>
                                                    <a href="<?php echo e(url('/mphome')); ?>">Home</a>
                                                <?php else: ?>
                                                   <a href="">Home</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Session::has('selected_state')): ?>
                                                    <?php if(Session::get('selected_state') == 'cg'): ?>
                                                        <a href="<?php echo e(url('/cghome')); ?>">Home</a>
                                                    <?php elseif(Session::get('selected_state') == 'mp'): ?>
                                                        <a href="<?php echo e(url('/mphome')); ?>">Home</a>
                                                    <?php else: ?>
                                                        <a href="">Home</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                   <a href="">Home</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->state == 'cg'): ?>
                                                    <a href="<?php echo e(url('/cgplan')); ?>">Plans</a>
                                                <?php elseif(Auth::user()->state == 'mp'): ?>
                                                    <a href="<?php echo e(url('/ourplan')); ?>">Plans</a>
                                                <?php else: ?>
                                                    <a href="">Plans</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Session::has('selected_state')): ?>
                                                    <?php if(Session::get('selected_state') == 'cg'): ?>
                                                      <a href="<?php echo e(url('/cgplan')); ?>">Plans</a>
                                                    <?php elseif(Session::get('selected_state') == 'mp'): ?>
                                                      <a href="<?php echo e(url('/ourplan')); ?>">Plans</a>
                                                    <?php else: ?>
                                                      <a href="">Plans</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                   <a href="">Plans</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->state == 'cg'): ?>
                                                    <a href="<?php echo e(url('/cgpyq')); ?>">PYQ</a>
                                                <?php elseif(Auth::user()->state == 'mp'): ?>
                                                    <a href="<?php echo e(url('/pyq')); ?>">PYQ</a>
                                                <?php else: ?>
                                                    <a href="">PYQ</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Session::has('selected_state')): ?>
                                                    <?php if(Session::get('selected_state') == 'cg'): ?>
                                                      <a href="<?php echo e(url('/cgpyq')); ?>">PYQ</a>
                                                    <?php elseif(Session::get('selected_state') == 'mp'): ?>
                                                      <a href="<?php echo e(url('/pyq')); ?>">PYQ</a>
                                                    <?php else: ?>
                                                        <a href="">PYQ</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                   <a href="">PYQ</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->state == 'cg'): ?>
                                                  <a href="<?php echo e(url('/cgMainsPractice')); ?>">Mains Practice Question</a>
                                                <?php elseif(Auth::user()->state == 'mp'): ?>
                                                  <a href="<?php echo e(url('/MainsPractice')); ?>">Mains Practice Question</a>
                                                <?php else: ?>
                                                  <a href="">Mains Practice Question</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(Session::has('selected_state')): ?>
                                                    <?php if(Session::get('selected_state') == 'cg'): ?>
                                                      <a href="<?php echo e(url('/cgMainsPractice')); ?>">Mains Practice Question</a>
                                                    <?php elseif(Session::get('selected_state') == 'mp'): ?>
                                                      <a href="<?php echo e(url('/MainsPractice')); ?>">Mains Practice Question</a>
                                                    <?php else: ?>
                                                      <a href="">Mains Practice Question</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                  <a href="">Mains Practice Question</a>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </li>
                                        <li><a href="<?php echo e(url('/aboutus')); ?>">About</a></li>
                                        <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                                        <?php if(Auth::check()): ?>
                                        <?php
                                                $user = Auth::user();
                                                $districtName = 'Unknown';
                                            
                                                if ($user->state === 'cg') {
                                                    $districtName = DB::table('cg_district')->where('id', $user->district)->value('name');
                                                } elseif ($user->state === 'mp') {
                                                    $districtName = DB::table('mp_district')->where('id', $user->district)->value('name');
                                                }
                                            ?>
                                            <li>
                                                <a href="<?php echo e(route('user.answerForm')); ?>">My Account <i class="fas fa-user me-1"></i></a>
                                                <ul class="" >
                                                    <li><a href="<?php echo e(route('user.count')); ?>">View Profile</a></li>
                                                    <?php if(Auth::check() && Auth::user()->name): ?>
                                                        <li><a href="#!"><i class="fas fa-user me-1"></i> <?php echo e(Auth::user()->name); ?></a></li>
                                                    <?php endif; ?>
                                                    <li><a href=""><i class="fas fa-envelope me-1"></i> <?php echo e(Auth::user()->email); ?></a></li>
                                                    <?php if(!empty($districtName)): ?>
                                                        <li><a href=""><i class="fas fa-map-marker-alt me-1"></i> <?php echo e($districtName); ?></a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>

                                            
                                            
                                        <?php endif; ?>
                                        
                                    </ul>
                                    <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                       
                                        <ul>
                                            <?php if(Auth::check()): ?>

                                        
                                                <li class="d-none d-xl-inline-block">
                                                    <a href="<?php echo e(route('user.logout')); ?>" class="butn md text-white">
                                                        <i class="fas fa-sign-out-alt icon-arrow before"></i>
                                                        <span class="label">Logout</span>
                                                        <i class="fas fa-sign-out-alt icon-arrow after"></i>
                                                    </a>
                                                   
                                                </li>

                                                <li class="d-block d-xl-none">
                                                    <a href="<?php echo e(route('user.logout')); ?>" class="butn md text-white">
                                                        <i class="fas fa-sign-out-alt icon-arrow before"></i>
                                                        <span class="label">Logout</span>
                                                        <i class="fas fa-sign-out-alt icon-arrow after"></i>
                                                    </a>
                                                   
                                                </li>

                                            <?php else: ?>
                                            <li class="d-block d-xl-none"> <!-- Mobile me dikhane ke liye -->
                                                <a href="<?php echo e(route('login')); ?>" class="butnlogin butn md text-white p-0 " data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    <i class="fas fa-user icon-arrow before"></i>
                                                    <span class="label">Login</span>
                                                    <i class="fas fa-user icon-arrow after"></i>
                                                </a>
                                            </li>
                                            <li class="d-none d-xl-inline-block"> <!-- Sirf desktop par dikhane ke liye -->
                                                <a href="<?php echo e(route('login')); ?>" class="butnlogin butn md text-white" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    <i class="fas fa-plus-circle icon-arrow before"></i>
                                                    <span class="label">Login</span>
                                                    <i class="fas fa-plus-circle icon-arrow after"></i>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                        
                                    </div>
                                    <!-- end attribute navigation -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(!empty($offers->description)): ?>
                    <section class="marquee-section py-2" style="background: #2c316f1f; overflow: hidden;">
                        <div class="container">
                            <div class="marquee-wrapper d-flex justify-content-center align-items-center flex-wrap text-center">
                                <div class="d-flex align-items-center flex-wrap justify-content-center">
                                    <span class="badge bg-danger text-white me-2 blinking mb-1">Offer</span>
                                    <h4 style="color: rgb(220, 53, 69); font-size: 16px; margin: 0; white-space: normal; line-height: 1.4;">
                                        <?php echo e($offers->description); ?>

                                    </h4>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        </header>
        <div class="modal fade" id="loginModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal-content">

                    <div class="modal-header">
                        <img src="<?php echo e(asset('./assets/admin/img/mainsorbit.png')); ?>" alt="Logo" height="200" width="250">
                        <button type="button" class="btn position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark" style="color: #ff7029; font-size: 1.2rem;"></i>
                        </button>
                    </div>

                    <div class="modal-body">

                        <!-- Google Login Button -->
                        <button id="loginBtn" class="btn w-100 d-flex align-items-center justify-content-center py-2 loginb">
                            <img src="<?php echo e(asset('/assets/front/img/logos/google.png')); ?>" 
                                alt="Google Logo" width="20" class="me-2">
                            Login with Google
                        </button>

                        <p id="user"></p>

                        <!-- OR Divider -->
                        <div class="text-center my-2">
                            <span class="or-divider">OR</span>
                        </div>
                        <hr>

                        <!-- Email Form -->
                        <?php if(!session('otp_sent')): ?>
                        <form action="<?php echo e(route('send.otp')); ?>" method="post" id="emailForm">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" id="emailInput" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <button type="submit" class="btn btn-login w-100">Send OTP</button>
                        </form>
                        <?php endif; ?>

                        <!-- OTP Verification Form -->
                        <?php if(session('otp_sent')): ?>
                        <form action="<?php echo e(route('verify.otp')); ?>" method="post" id="otpForm">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="otp" class="form-label">Enter OTP</label>
                                <input type="text" class="form-control" name="otp" required>
                                <?php $__errorArgs = ['otp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <p style="font-size: 10px">
                                <i class="fa-solid fa-circle-exclamation"></i> In case if you haven't received OTP please check your spam folder.
                            </p>
                            <button type="submit" class="btn btn-login w-100">Verify OTP</button>
                        </form>
                        <form action="<?php echo e(route('resend.otp')); ?>" method="post" class="mt-2">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="email" value="<?php echo e(session('email')); ?>">
                            <button type="submit" class="btn btn-outline-primary w-100">Resend OTP</button>
                        </form>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Check if session has OTP sent message
                    <?php if(session('otp_sent')): ?>
                        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        loginModal.show();
                    <?php endif; ?>
                });

                document.addEventListener('click', function(event) {
                    const nav = document.getElementById('nav');
                    const toggler = document.querySelector('.navbar-toggler')

                    
                    if (nav.style.display === 'block') {
                        
                        if (!nav.contains(event.target) && !toggler.contains(event.target)) {
                            nav.style.display = 'none';
                            toggler.classList.remove('menu-opened');
                        }
                    }
                });

                document.getElementById('userDropdown').addEventListener('click', function(e) {
                    if (window.innerWidth < 992) { // mobile view
                        window.location.href = "<?php echo e(route('user.count')); ?>";
                    }
                });
            </script>
      
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                <?php if(session('success')): ?>
                    Swal.fire({
                        title: "Submitted!",
                        text: "<?php echo e(session('success')); ?>",
                        icon: "success",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK"
                    })
                <?php endif; ?>

                <?php if(session('error')): ?>
                    Swal.fire({
                        title: "Oops!",
                        text: "<?php echo e(session('error')); ?>",
                        icon: "error",
                        confirmButtonColor: "#d33",
                        confirmButtonText: "Try Again"
                    });
                <?php endif; ?>
            });
        </script>
        <?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/front/layouts/header.blade.php ENDPATH**/ ?>