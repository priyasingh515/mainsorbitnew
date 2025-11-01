
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


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
        min-height: 600px; /* Adjust as needed */
        background-size: cover !important; 
        background-position: center center !important;
        background-repeat: no-repeat !important;
    }
    .headcap{
            display: inline-block;
    }
    .headcap:first-letter {
        /* text-transform: uppercase; */
    }

    .but {
        font-size: 30px;
        padding: 12px 36px; 
        border-radius: 8px;
        font-weight: bold;
        display: inline-flex; 
        align-items: center; 
        justify-content: center;
        gap: 10px; 
        /* text-transform: uppercase; */
    }

    @media (max-width: 768px) {

        .but {
            font-size: 16px; 
            padding: 8px 16px;
            width: auto; 
            text-align: center;
            display: inline-flex; 
            margin-bottom: 8px;
        }

        .but i {
            font-size: 18px; 
        }

        .headcap{
            font-size: 25px !important;
            margin-top: 0px !important; 
            text-align: center; 
            
        }

        .col-md-10.col-lg-8.col-xl-7 {
            text-align: left; 
            padding-top: 20px;
        }
    }

    .sample {
        background-color: #2c316f;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .sample a {
        color: #273044; 
        text-decoration: none;
    }

    .sample h3 {
        color: white;
    }

    .contact-card {
            border: none;
            padding: 20px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #313460;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 250px; /* Adjust width */
            margin: auto; /* Center align */
        }

        .contact-card:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        }

        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 43px;
        }

        .contact-icon {
            height: 60px;
            width: 60px;
            display: block;
            margin: 0 auto;
        }

        .contact-card a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-info {
            color: #fff;
            font-size: 14px;
        }

        .contact-cards{
        border: none;
        padding: 20px;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: #313460;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 450px;
        margin: auto; 
    }
    .contact-cards:hover {
        transform: scale(1.1);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    }

    .contact-cards a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
</style>

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
        background: #fefefe;
        color: white;
        padding: 0px -39px;
        min-height: 300px;
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
        background: rgba(248, 249, 250);
        /* background: #fefefe; */
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
        width: 140px;
        height: 160px;
        border-radius: 10px;
        border: 2px solid rgba(248, 249, 250);
        object-fit: cover;
        position: relative;
        left: 30px;  /* Remove left offset */
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
        top: 45%;
        transform: translateY(-50%);
        cursor: pointer;
        z-index: 1;
    }
    .slick-prev:hover, .slick-next:hover{
        background: #2c316f;
    }

    .slick-prev {
        left: 100%;
    }

    .slick-next {
        right: 100%;
    }

    .slick-slide {
        margin: 0 15px;
    }

    .slick-track{
        height: 280px;
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
        max-width: 250px;
    }

    .team-member h3, 
    .team-member p {
        margin-top: 10px;
        text-align: center;
        font-size: 15px;
        color: white;
    }

    .evaluate{
            color: black;
            font-size: 17px !important;
        }

    /* ✅ Mobile View */
    @media (max-width: 767px) {
        .row {
            /* margin-top: 20px; */
            /* flex-direction: column; */
            align-items: start;
            gap: 0px;
        }

        
        .evaluate{
            color: black;
            font-size: 14px !important;
        }

        
        .col-auto {
            width: 100%;
            justify-content: start; 
            display: flex;
            align-items: center;
            gap: 10px; 
            margin: 5px 0; 
        }
        .icon-box {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #2c316f;
        }
        .icon-box i {
            font-size: 1.5rem;
        }
        .col-auto a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px;
        }
        .slider_button{
        margin-inline: 15px !important;
    }

        .team-section {
            background: #fefefe;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px 20px;
            min-height: 250px;
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


        
        /* .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: rgba(248, 249, 250);
            border: 2px solid #e0dedeb0;
            border-radius: 10px;
            padding: 20px;
            width: 220px;
            height: 408px;
            box-shadow: 4px 4px 10px 0 rgba(165, 155, 155, 0.56);
            position: relative;
            transition: border 0.3s ease; 
            border: 2px solid transparent;
        } */

        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: #fefefe;
            border: 2px solid #e0dedeb0;
            border-radius: 10px;
            padding: 20px;
            width: 220px;
            height: 260px;
            box-shadow: 4px 4px 10px 0 rgba(165, 155, 155, 0.56);
            position: relative;
            transition: border 0.3s ease; 
            border: 2px solid transparent;
        }

        .team-member:hover {
            border: 2px solid #ff7029;
        }

        .slick-slide{
            height: 300px;
            /* width:auto */
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

        .slick-prev {
            left: 80%;
        }

        .slick-next {
            right: 80%;
        }
    }
    
    .slider_button{
            border-radius: 30px;
            /* margin-inline: 30px !important; */
        }

        @media (max-width: 767px) {
            .slider_button{
                border-radius: 30px;
                margin-inline: 0px !important;
            }
        }

         .carousel-item {
            position: relative;
            }
            .carousel-inner {
                max-height: 100vh; /* Adjust as needed */
                overflow: hidden;
            }

            .carousel-item img {
                height: 100vh; /* Same as carousel-inner height */
                /* object-fit: contain; Crop image to fit without distortion */
            }

            @media (max-width: 767.98px) {
                .carousel-inner {
                    max-height: none;
                }

                .carousel-item img {
                   
                    height: 246px;
                }

                .carousel-overlay .content h5 {
                    font-size: 17px;  /* chhota size mobile ke liye */
                    line-height: 1.3;
                }

                /* paragraph responsive */
                .carousel-overlay .content p {
                    font-size: 12px;
                    line-height: 1.4;
                }

                /* buttons bhi responsive ho jaye */
                .carousel-overlay .content .btn {
                    padding: 6px 12px;
                    font-size: 12px;
                    margin: 2px;
                }
            }

            .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45); /* darker transparent overlay */
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 0 15%;
            z-index: 2;
            pointer-events: none; /* allow clicks to go through, except content */
            }

            .carousel-overlay .content {
            max-width: 600px;
            color: #fff;
            pointer-events: auto; /* allow interaction with buttons */
            }

            .carousel-overlay h5 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #ffff;
            }

            .carousel-overlay p {
            font-size: 1.3rem;
            margin-bottom: 20px;
            line-height: 1.5;
            }

            .carousel-overlay .btn {
            font-size: 1.2rem;         /* Bigger text */
            padding: 14px 28px;        /* More padding for size */
            margin-right: 10px;
            border-radius: 8px;        /* Optional: rounded corners */
            font-weight: 600;
            }

            @media (max-width: 768px) {
            .carousel-overlay {
                padding: 20% 10%;
                align-items: flex-start; /* start content from top for small devices */
                text-align: left;
            }

            .carousel-overlay .content {
                max-width: 100%;
            }

            .carousel-overlay h5 {
                font-size: 1rem;
                color: #ffff;
            }

            .carousel-overlay p {
                font-size: 0.5rem;
            }

            .carousel-overlay .btn {
                font-size: 0.9rem;
                padding: 8px 16px;
                margin-bottom: 10px;
            }
            }
            .hero-img {
                    max-width: 86% !important;  /* chhota kar diya */
                }

            @media (max-width: 576px) {
                .custom-heading {
                    padding-top: 60px;
                    font-size: 2rem; /* yaha apni zarurat ke hisab se bada size set karein */
                    text-align: start;
                    padding-left:31px;
                }
                .custom-para {
                    font-size: 1rem; /* yaha apni zarurat ke hisab se bada size set karein */
                    text-align: start;
                    padding-left:31px;
                }
                .hero-img {
                    max-width: 50% !important;  /* chhota kar diya */
                }
            }

            .center-box {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;     
                     
            }
</style>
<style>
    .headcap p {
        margin: 0;
        line-height: 1.3; /* optional */
    }

    @media  only screen and (max-width: 768px) {
        .headcap {
            text-align: justify !important;
        }
        .para{
            text-align: justify !important;
            margin-left:30px !important;
            }
    }

    .para{
            text-align: justify;
            margin-left:10px;
        }


           .carousel-item {
            position: relative;
            }
            .carousel-inner {
                max-height: 100vh; /* Adjust as needed */
                overflow: hidden;
            }

            .carousel-item img {
                height: 100vh; /* Same as carousel-inner height */
                /* object-fit: contain; Crop image to fit without distortion */
            }

            @media (max-width: 767.98px) {
                .carousel-inner {
                    max-height: none;
                }

                .carousel-item img {
                   
                    height: auto;
                }

                .carousel-overlay .content h5 {
                    font-size: 17px;  /* chhota size mobile ke liye */
                    line-height: 1.3;
                }

                /* paragraph responsive */
                .carousel-overlay .content p {
                    font-size: 12px;
                    line-height: 1.4;
                }

                /* buttons bhi responsive ho jaye */
                .carousel-overlay .content .btn {
                    padding: 6px 12px;
                    font-size: 12px;
                    margin: 2px;
                }
            }

            .carousel-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45); /* darker transparent overlay */
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 0 15%;
            z-index: 2;
            pointer-events: none; /* allow clicks to go through, except content */
            }

            .carousel-overlay .content {
            max-width: 600px;
            color: #fff;
            pointer-events: auto; /* allow interaction with buttons */
            }

            .carousel-overlay h5 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #ffff;
            }

            .carousel-overlay p {
            font-size: 1.3rem;
            margin-bottom: 20px;
            line-height: 1.5;
            }

            .carousel-overlay .btn {
            font-size: 1.2rem;         /* Bigger text */
            padding: 14px 28px;        /* More padding for size */
            margin-right: 10px;
            border-radius: 8px;        /* Optional: rounded corners */
            font-weight: 600;
            }

            @media (max-width: 768px) {
            .carousel-overlay {
                padding: 20% 10%;
                align-items: flex-start; /* start content from top for small devices */
                text-align: left;
            }

            .carousel-overlay .content {
                max-width: 100%;
            }

            .carousel-overlay h5 {
                font-size: 1rem;
                color: #ffff;
            }

            .carousel-overlay p {
                font-size: 0.5rem;
            }

            .carousel-overlay .btn {
                font-size: 0.9rem;
                padding: 8px 16px;
                margin-bottom: 10px;
            }
            }
            .hero-img {
                    max-width: 86% !important;  /* chhota kar diya */
                }

            @media (max-width: 576px) {
                .custom-heading {
                    font-size: 2rem; /* yaha apni zarurat ke hisab se bada size set karein */
                    text-align: start;
                    padding-left:31px
                }
                .custom-para {
                    font-size: 1rem; /* yaha apni zarurat ke hisab se bada size set karein */
                    text-align: start;
                    padding-left:31px
                }
                .hero-img {
                    max-width: 50% !important;  /* chhota kar diya */
                }
            }

            .center-box {
                display: flex;
                flex-direction: column;
                justify-content: center; /* vertical center */
                align-items: center;     /* horizontal center */
                     /* full screen height */
            }
</style>


<section class="py-0 bg-light">
        <div class="container">
            <div class="row align-items-center text-center text-md-start">

            <!-- Text -->
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            
                <div class="col-12 col-md-6 order-1 order-md-1">
                    <h1 class="display-7 fw-bold mb-4 custom-heading">
                    <?php echo e($item->heading); ?>

                    </h1>
                    <p class="lead text-muted mb-4 custom-para">
                        <?php echo e($item->paragraph); ?>

                    </p>

                    <!-- Desktop buttons -->
                    <div class="d-none d-md-flex flex-row gap-3">
                        <a href="<?php echo e(route('user.questionadd')); ?>" class="butn  btn-lg">
                            <i class="fas fa-plus-circle icon-arrow before"></i>
                            <span class="label"style="font-size: 20px">Take a Demo</span>
                            <i class="fas fa-plus-circle icon-arrow after"></i>
                        </a>
                        <?php
                            $planLink = '';
                            if (auth()->check()) {
                                if (Auth::user()->state == 'cg') {
                                    $planLink = url('cgplan');
                                } elseif (Auth::user()->state == 'mp') {
                                    $planLink = url('ourplan');
                                }
                            } elseif (Session::has('selected_state')) {
                                if (Session::get('selected_state') == 'cg') {
                                    $planLink = url('cgplan');
                                } elseif (Session::get('selected_state') == 'mp') {
                                    $planLink = url('ourplan');
                                }
                            }
                        ?>
                        <a href="<?php echo e($planLink); ?>" class="butn btn-outline-primary btn-lg">
                            <i class="fas fa-plus-circle icon-arrow before"></i>
                            <span class="label"style="font-size: 20px">Pick a Plan</span>
                            <i class="fas fa-plus-circle icon-arrow after"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Image -->
                <div class="col-12 col-md-6 order-2 order-md-2 mb-4 mb-md-0 text-center">
                    <img src="<?php echo e(asset('/assets/front/img/mppsc.png')); ?>" 
                        alt="Hero Illustration" 
                        class="img-fluid hero-img">
                </div>

                <!-- Mobile Buttons -->
                <div class="col-12 order-3 d-flex d-md-none flex-column gap-3 center-box">
                    <a href="<?php echo e(route('user.questionadd')); ?>" class="butn w-75">
                        <i class="fas fa-plus-circle icon-arrow before"></i>
                        <span class="label"style="font-size: 25px">Take a Demo</span>
                        <i class="fas fa-plus-circle icon-arrow after"></i>
                    </a>
                    <a href="<?php echo e($planLink); ?>" class="butn btn-outline-primary w-75">
                        <i class="fas fa-plus-circle icon-arrow before"></i>
                        <span class="label"style="font-size: 25px">Pick a Plan</span>
                        <i class="fas fa-plus-circle icon-arrow after"></i>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- INFORMATION
            ================================================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row mt-n1-9">
                <div class="col-md-6 col-lg-4 mt-1-9">
                    <div class="card card-style3 h-100">
                        <div class="card-body px-1-9 py-2-3">
                            <div class="mb-3 d-flex align-items-center">
                                <div class="card-icon">
                                    <i class="ti-pencil"></i>
                                </div>
                                <h4 class="ms-4 mb-0">1.Write answers</h4>
                            </div>
                            <div>
                                <p class="mb-3">Choose questions from any source including our mains practice question.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mt-1-9">
                    <div class="card card-style3 h-100">
                        <div class="card-body px-1-9 py-2-3">
                            <div class="mb-3 d-flex align-items-center">
                                <div class="card-icon">
                                    <i class="ti-arrow-up"></i>
                                </div>
                                <h4 class="ms-4 mb-0">2. Scan & Upload</h4>
                            </div>
                            <div>
                                <p class="mb-3">Upload your answer on your dashboard for evaluation.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mt-1-9">
                    <div class="card card-style3 h-100">
                        <div class="card-body px-1-9 py-2-3">
                            <div class="mb-3 d-flex align-items-center">
                                <div class="card-icon">
                                    <i class="ti-user"></i>
                                </div>
                                <h4 class="ms-4 mb-0">3. Evaluation & Suggestion</h4>
                            </div>
                            <div>
                                <p class="mb-3">Get Your answer evaluated and get suggestion  for better score by selected or interview appeared faculty.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(count($Guides) > 0): ?>
        <section style="background: #fefefe">
            <div class="section-heading guide">
                <h2 class="h1 mb-0">Under The Guidance Of</h2>
            </div>
            <div class="team-section">
                <div class="team-container">
                    <?php $__currentLoopData = $Guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="team-member">
                            <img src="<?php echo e(asset('/admin/guide/'.$guide->photos)); ?>" alt="<?php echo e($guide->name); ?>">
                            <h3 style="color: rgba(9, 67, 109, 0.87)"><?php echo e($guide->rank); ?></h3>
                            <h6 style="color: black"><?php echo e(strtoupper($guide->name)); ?></h6>
                            <p style="color: black; margin-top:-5px;font-size:12px"><b><?php echo e($guide->post); ?></b></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="bg-light" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-heading text-center">
                        
                        <h2 class="h1 mb-0" style="color: #2c316f">Sample Evaluation</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-n1-9">
                <?php $__currentLoopData = $samples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sample): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-lg-4 col-xl-3 mt-1-9">
                        <div class="category-item-01 shadow " style="height:200px">
                            <a href="<?php echo e(url('public/admin/sample/'.$sample->sample_file)); ?>" class="d-block text-decoration-none" target="_blank">
                                <div class="category-img text-center">
                                    <img src="<?php echo e(asset('public/assets/front/img/logos/pd.png')); ?>" alt="PDF Icon" height="80" width="80">
                                </div>
                                <div class="ms-3 text-center">
                                    <h4 class="mb-0 evaluate"><?php echo e($sample->name); ?></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <?php if($plans->count() > 0): ?>
    <section>
        <div class="container">
            <div class="section-heading">
                <h2 class="h1 mb-0">Our Plans</h2>
            </div>
            <div class="row align-items-center g-xl-5 mt-n1-9">
                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 mt-1-9">
                        <div class="card card-style4 p-1-9 p-xl-5">
                            <div class="border-bottom pb-1-9 mb-1-9 section-heading">
                                <span class=" sub-title d-block"><?php echo e($plan->plan_name); ?></span>
                                <h4 class="text-dark display-5 display-xxl-4 mb-0 lh-1 fw-bold"><?php echo e($plan->price); ?><span class="display-29">/₹</span></h4>
                            </div>
                            <ul class="list-unstyled mb-2-9">
                                <li class="mb-3"><i class="fas fa-check text-primary me-3"></i><?php echo e($plan->plan_validity); ?></li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-3"></i><?php echo e($plan->description_1); ?></li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-3"></i><?php echo e($plan->description_2); ?></li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-3"></i><?php echo e($plan->description_3); ?></li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-3"></i><?php echo e($plan->description_4); ?></li>
                                <li class="mb-3"><i class="fas fa-check text-primary me-3"></i><?php echo e($plan->medium); ?></li>
                            </ul>
                            <div>
                                <a href="javascript:void(0);" onclick="checkLogin1(<?php echo e($plan->id); ?>)" class="butn">
                                    <i class="far fa-gem icon-arrow before"></i>
                                    <span class="label">Choose Plan</span>
                                    <i class="far fa-gem icon-arrow after"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
            <div class="d-flex justify-content-end mt-4">
                <a href="<?php echo e(url('ourplan')); ?>" style="color:#2c316f">
                    <b>View More</b> <i class="fas fa-arrow-right"></i> 
                </a>
        </div>
        </div>
    </section>
    <?php endif; ?>

    <input type="hidden" id="auth_user" value="<?php echo e(Auth::check() ? '1' : '0'); ?>">

    <div class="modal fade" id="purchasePlanModal" tabindex="-1" aria-labelledby="purchasePlanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchasePlanModalLabel">Enter Your Details</h5>
                    <button type="button" class="btn-close orange-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="purchasePlanForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="plan_id" id="plan_id">
    
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter Your Number" name="phone" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="district" class="form-label">District</label>
                            <select class="form-control" id="district" name="district" required>
                                <option value="">Select District</option>
                                    <?php $__currentLoopData = $mpDistricts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php if($questionpapers->count() > 0): ?>
        <section class="bg-light" >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-heading text-center">
                            <h2 class="h1 mb-0" style="color: #2c316f">Previous Year Question paper</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-n1-9">
                    <?php $__currentLoopData = $questionpapers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-6 col-lg-4 col-xl-3 mt-1-9">
                            <div class="category-item-01 shadow " style="height:200px">
                                <a href="<?php echo e(url('/'.$question->pdf_path)); ?>" class="d-block text-decoration-none" target="_blank">
                                    <div class="category-img text-center">
                                        <img src="<?php echo e(asset('/assets/front/img/logos/pd.png')); ?>" alt="PDF Icon" height="80" width="80">
                                    </div>
                                    <div class="ms-3 text-center">
                                        <h4 class="mb-0 evaluate"><?php echo e($question->paper_name); ?></h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex justify-content-end mt-4">
                        <a href="<?php echo e(url('pyq')); ?>" style="color:#2c316f">
                            <b>View More</b> <i class="fas fa-arrow-right"></i> 
                        </a>
                </div>
            </div>
        </section>
    <?php endif; ?>

     
    

    <section class="contact-form pb-0">
        <div class="container mb-2-9 mb-md-6 mb-lg-7">
            <div class="section-heading">
                
                <h2 class="mb-9 display-16 display-sm-14 display-lg-10 font-weight-800 h1 mb-5">Connect to Us</h2>
                <div class="heading-seperator"><span></span></div>
            </div>
            <div class="row mt-n2-9 mb-md-6 mb-lg-7">
                <div class="col-lg-6 mt-2-9">
                    <div class="contact-wrapper bg-white shadow rounded position-relative h-100 px-4">
                        <div class="mb-4">
                            <i class="contact-icon ti-email"></i>
                        </div>
                        <div>
                            <h4>Email Here</h4>
                            <ul class="list-unstyled p-0 m-0">
                                <li>
                                    <a href="mailto:<?php echo e($settingsData->email); ?>" style="color: rgb(9 67 109 / 87%);font-size: 20px">
                                        <?php echo e($settingsData->email); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6 mt-2-9">
                    <div class="contact-wrapper bg-white shadow rounded position-relative h-100 px-4">
                        <div class="mb-4">
                            <i class="contact-icon ti-mobile"></i>
                        </div>
                        <div>
                            <h4>Call Here</h4>
                            <ul class="list-unstyled p-0 m-0">
                                <li>
                                    <a href="tel:+91<?php echo e($settingsData->mobile); ?>" style="color: rgb(9 67 109 / 87%);font-size: 20px">
                                        +91<?php echo e($settingsData->mobile); ?>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function checkLogin1(planId) {

                let isLoggedIn = $("#auth_user").val(); 
         
                 if (isLoggedIn == "1") {
                     $("#plan_id").val(planId);
                 } else {
                     alert("Please log in to purchase a plan.");
                     $("#loginModal").modal("show");
                 }
                

               $("#purchasePlanForm").submit(function(e) {
                    e.preventDefault();
                    let formData = $(this).serialize(); 

                    $.ajax({
                        url: "<?php echo e(route('purchase.plan')); ?>",
                        type: "POST",
                        data: formData,
                        success: function(response) {
                            Swal.fire("Success", response.message, "success");
                            $("#purchasePlanModal").modal("hide");

                            if (response.redirect_url) {
                                setTimeout(() => {
                                    window.location.href = response.redirect_url;
                                }, 1000);
                            }
                        },
                        error: function(xhr) {
                            let res = xhr.responseJSON;
                            if (res && res.errors) {
                                let messages = Object.values(res.errors).flat().join('<br>');
                                Swal.fire("Validation Error", messages, "error");
                            } else {
                                Swal.fire("Error", res.message || "Something went wrong.", "error");
                            }
                        }
                    });
                });
                if (isLoggedIn == "1") {
                    $.ajax({
                        url: "<?php echo e(route('check.active.plan')); ?>",
                        type: "POST",
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            plan_id: planId 
                        },
                        success: function(response) {
                            if (response.status === "ok") {
                                $("#plan_id").val(planId);
                                $("#purchasePlanModal").modal("show");
                            } 
                            else if (response.status === "exists") {
                                Swal.fire({
                                    title: "Plan",
                                    text: response.message,
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes, expire old plan",
                                    cancelButtonText: "Cancel"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: "<?php echo e(route('expire.active.plan')); ?>",
                                            type: "POST",
                                            data: {
                                                _token: "<?php echo e(csrf_token()); ?>"
                                            },
                                            success: function(expired){
                                                Swal.fire("Expired!", expired.message, "success");
                                                setTimeout(() => {
                                                    $("#plan_id").val(planId);
                                                    $("#purchasePlanModal").modal("show");
                                                }, 300);
                                            },
                                            error: function(xhr) {
                                                Swal.fire("Error", "Failed to expire current plan.", "error");
                                            }
                                        });
                                    }
                                });
                            } 
                            else if (response.status === "higher_or_equal") {
                                Swal.fire("Not Allowed", response.message, "info");
                            }
                        },
                        error: function() {
                            Swal.fire("Error", "Error checking active plan.", "error");
                        }
                    });
                } else {
                    Swal.fire("Login Required", "Please log in to purchase a plan.", "info");
                    $("#loginModal").modal("show");
                }
            }

        </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        AOS.init({
            duration: 3000,
             
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\rayss\mainsorbitnew\public_html\resources\views/front/mphome.blade.php ENDPATH**/ ?>