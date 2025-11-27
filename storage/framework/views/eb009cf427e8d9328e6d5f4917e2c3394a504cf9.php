<footer class="" style="background: #313460">
    <div  class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                <a href="/" class="footer-logo">
                    <img src="<?php echo e(asset('/assets/admin/img/mainsorbit.png')); ?>" height="170" width="auto" class="mb-4" alt="Footer Logo">
                </a>
                <p class="mb-1-6 text-white">
                At MAINSORBIT, our mission is to provide high-quality, structured, and strategic ANSWER WRITING PLATFORM that empowers students to achieve their goals by further focusing on MAINS preparation. 
                </p>
                <form class="quform newsletter" action="quform/newsletter-two.php" method="post" enctype="multipart/form-data" onclick="">

                    <div class="quform-elements">

                        <div class="row">


                        </div>

                    </div>

                </form>
            </div>
            <?php
                $user = Auth::user();
            ?>
            <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                <div class="ps-md-1-6 ps-lg-1-9">
                    <h5 class="" style="color: #ffff">Quick Links</h5>
                    <ul class="footer-list">
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
                                <?php endif; ?>
                            <?php endif; ?>
                        </li>
                        <li><a href="<?php echo e(url('/aboutus')); ?>">About Us</a></li>
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
                                <?php endif; ?>
                            <?php endif; ?>
                        </li>
                        
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-2-5 mb-md-0">
                <div class="ps-lg-1-9 ps-xl-2-5">
                    <h5 class=""style="color: #ffff">Quick Links</h5>
                    <ul class="footer-list">
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
                                <?php endif; ?>
                            <?php endif; ?>

                        </li>
                        <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                    <div class="ps-md-1-9">
                        <h5 class="" style="color: #ffff">Social Media Links</h5>
                        <ul class="list-unstyled d-flex gap-3">
                            <li>
                                <a href="mailto:your-<?php echo e($settingsData->email); ?>" target="_blank">
                                    <i class="fas fa-envelope"></i>
                                    
    
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/mppscmainsorbit"  target="_blank">
                                    <i class="fab fa-telegram"></i>
                                    
    
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/<?php echo e($settingsData->whatsapp); ?>"  target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    
    
                                </a>
    
                            </li>
                            <li>
                                <a href="tel:+<?php echo e($settingsData->mobile); ?>">
                                    <i class="fas fa-phone"></i>
                                    
    
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q"  target="_blank">
                                    <i class="fab fa-youtube"></i>
                                    
    
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            
        </div>
        <div class="footer-bar text-center">
            <p class="mb-0 text-white font-weight-500">&copy; <span class="current-year"></span> <a href="https://www.raysitworld.com/" class="text-secondary" target="_blank">Powered by Rays IT & Design World</a></p>
        </div>
    </div>
</footer>

    </div>

    

    <div class="buy-theme alt-font d-block">
        <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->state == 'cg'): ?>
                <a href="https://t.me/mainsorbit_cgpsc" target="_blank">
                    <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            <?php elseif(Auth::user()->state == 'mp'): ?>
                <a href="https://t.me/mainsorbit_mppsc" target="_blank">
                    <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            <?php else: ?>
                <a href="" target="_blank">
                    <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <?php if(Session::has('selected_state')): ?>
                <?php if(Session::get('selected_state') == 'cg'): ?>
                    <a href="https://t.me/mainsorbit_cgpsc" target="_blank">
                        <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                        <span>Join Telegram</span>
                    </a>
                <?php elseif(Session::get('selected_state') == 'mp'): ?>
                    <a href="https://t.me/mainsorbit_mppsc" target="_blank">
                        <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                        <span>Join Telegram</span>
                    </a>
                <?php else: ?>
                    <a href="https://t.me/mainsorbit_cgpsc" target="_blank">
                        <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                        <span>Join Telegram</span>
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="https://t.me/mainsorbit_mppsc" target="_blank">
                    <img src="<?php echo e(asset('/assets/front/img/logos/telegram.png')); ?>" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    
    

    

    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery -->
    <script src="<?php echo e(asset('/assets/front/js/jquery.min.js')); ?>"></script>

    <!-- popper js -->
    <script src="<?php echo e(asset('/assets/front/js/popper.min.js')); ?>"></script>

    <!-- bootstrap -->
    <script src="<?php echo e(asset('/assets/front/js/bootstrap.min.js')); ?>"></script>

    <!-- core.min.js -->
    <script src="<?php echo e(asset('/assets/front/js/core.min.js')); ?>"></script>

    <!-- search -->
    <script src="<?php echo e(asset('/assets/front/search/search.js')); ?>"></script>

    <!-- custom scripts -->
    <script src="<?php echo e(asset('/assets/front/js/main.js')); ?>"></script>

    <!-- form plugins js -->
    <script src="<?php echo e(asset('/assets/front/quform/js/plugins.js')); ?>"></script>

    <!-- form scripts js -->
    <script src="<?php echo e(asset('/assets/front/quform/js/scripts.js')); ?>"></script>

  
<!-- jQuery (if not already included) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Slick JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    $(document).ready(function(){
        let teamMembers = $('.team-member').length;

        if (teamMembers === 1) {
            $('.team-container').addClass('single-member');
        }

        if (teamMembers > 1) {
            $('.team-container').slick({
                slidesToShow: Math.min(teamMembers, 4),
                slidesToScroll: 1,    
                arrows: true,         
                prevArrow: '<button class="slick-prev"></button>',
                nextArrow: '<button class="slick-next"></button>',
                autoplay: true,       
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: Math.min(teamMembers, 3) }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: Math.min(teamMembers, 2) }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        } else {
            $('.team-container').css({
                "display": "flex",
                "justify-content": "center",
                "align-items": "center"
            });
        }
    });

    </script>
    
    

    

<script type="module">
    // ✅ Firebase SDK Import Karein
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
    import { getAuth, signInWithPopup, GoogleAuthProvider, signOut } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";

    // ✅ Firebase Config
    const firebaseConfig = {
        apiKey: "AIzaSyBdWnCj3GkBQTzfAbAvY8-7KHKAVJ0JA9s",
        authDomain: "mains-orbit-fbb61.firebaseapp.com",
        projectId: "mains-orbit-fbb61",
        storageBucket: "mains-orbit-fbb61.firebasestorage.app",
        messagingSenderId: "806680429402",
        appId: "1:806680429402:web:98b0a4ee140c5def7ae963",
        measurementId: "G-2RZ49SCLWF"
    };

    //Firebase Initialize Karein
    const app = initializeApp(firebaseConfig);
    const auth = getAuth();
    const provider = new GoogleAuthProvider();

        //  Google Login Function
        document.getElementById("loginBtn").addEventListener("click", () => {
            signInWithPopup(auth, provider)
                .then((result) => {
                    const user = result.user;
                    console.log("User Logged In:", user);

                    // ✅ Session se selected_state lein (agar localStorage ya sessionStorage me store kiya hai)
                    let selectedState = localStorage.getItem("selected_state"); 

                    fetch("https://mainsorbit.com/save-user", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") || ""
                        },
                        body: JSON.stringify({
                            // name: user.displayName,
                            email: user.email,
                            state: selectedState  
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("User Saved:", data);
                        window.location.href = 'https://mainsorbit.com/answerForm';
                    })
                    .catch(error => console.error("Fetch Error:", error));
                })
                .catch((error) => {
                    console.error("Login Error:", error);
                });
        });



    // Logout Function
    document.getElementById("logoutBtn").addEventListener("click", () => {
        signOut(auth)
            .then(() => {
                document.getElementById("user").innerHTML = "You are logged out";
            })
            .catch((error) => {
                console.error("Logout Error:", error);
            });
    });
</script>
    
</body>

</html><?php /**PATH C:\priyanka\mainsorbitnew\resources\views/front/layouts/footer.blade.php ENDPATH**/ ?>