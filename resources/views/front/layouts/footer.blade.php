<footer class="" style="background: #313460">
    <div  class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                <a href="/" class="footer-logo">
                    <img src="{{asset('/assets/admin/img/mainsorbit.png')}}" height="170" width="auto" class="mb-4" alt="Footer Logo">
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
            @php
                $user = Auth::user();
            @endphp
            <div class="col-md-6 col-lg-3 mb-2-5 mb-lg-0">
                <div class="ps-md-1-6 ps-lg-1-9">
                    <h5 class="" style="color: #ffff">Quick Links</h5>
                    <ul class="footer-list">
                        <li>
                            @auth
                                @if(Auth::user()->state == 'cg')
                                    <a href="{{ url('/cghome') }}">Home</a>
                                @elseif(Auth::user()->state == 'mp')
                                    <a href="{{ url('/mphome') }}">Home</a>
                                @else
                                    <a href="">Home</a>
                                @endif
                            @else
                                @if(Session::has('selected_state'))
                                    @if(Session::get('selected_state') == 'cg')
                                        <a href="{{ url('/cghome') }}">Home</a>
                                    @elseif(Session::get('selected_state') == 'mp')
                                        <a href="{{ url('/mphome') }}">Home</a>
                                    @else
                                        <a href="">Home</a>
                                    @endif
                                @endif
                            @endauth
                        </li>
                        <li><a href="{{url('/aboutus')}}">About Us</a></li>
                        <li>
                           
                            @auth
                                @if(Auth::user()->state == 'cg')
                                    <a href="{{ url('/cgpyq') }}">PYQ</a>
                                @elseif(Auth::user()->state == 'mp')
                                    <a href="{{ url('/pyq') }}">PYQ</a>
                                @else
                                    <a href="">PYQ</a>
                                @endif
                            @else
                                @if(Session::has('selected_state'))
                                    @if(Session::get('selected_state') == 'cg')
                                        <a href="{{ url('/cgpyq') }}">PYQ</a>
                                    @elseif(Session::get('selected_state') == 'mp')
                                        <a href="{{ url('/pyq') }}">PYQ</a>
                                    @else
                                        <a href="">PYQ</a>   
                                    @endif
                                @endif
                            @endauth
                        </li>
                        {{-- <li><a href="">Instructor</a></li> --}}
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-2-5 mb-md-0">
                <div class="ps-lg-1-9 ps-xl-2-5">
                    <h5 class=""style="color: #ffff">Quick Links</h5>
                    <ul class="footer-list">
                        <li>
                            @auth
                            @if(Auth::user()->state == 'cg')
                                <a href="{{ url('/cgplan') }}">Plans</a>
                            @elseif(Auth::user()->state == 'mp')
                                <a href="{{ url('/ourplan') }}">Plans</a>
                            @else
                                <a href="">Plans</a>
                            @endif
                        @else
                            @if(Session::has('selected_state'))
                                @if(Session::get('selected_state') == 'cg')
                                    <a href="{{ url('/cgplan') }}">Plans</a>
                                @elseif(Session::get('selected_state') == 'mp')
                                    <a href="{{ url('/ourplan') }}">Plans</a>
                                @else
                                    <a href="">Plans</a>
                                @endif
                            @endif
                        @endauth
                        </li> 
                        <li>
                            @auth
                                @if(Auth::user()->state == 'cg')
                                <a href="{{url('/cgMainsPractice')}}">Mains Practice Question</a>
                                @elseif(Auth::user()->state == 'mp')
                                <a href="{{url('/MainsPractice')}}">Mains Practice Question</a>

                                @else
                                <a href="">Mains Practice Question</a>

                                @endif
                            @else
                                @if(Session::has('selected_state'))
                                    @if(Session::get('selected_state') == 'cg')
                                    <a href="{{url('/cgMainsPractice')}}">Mains Practice Question</a>
                                    @elseif(Session::get('selected_state') == 'mp')
                                    <a href="{{url('/MainsPractice')}}">Mains Practice Question</a>

                                    @else
                                    <a href="">Mains Practice Question</a>
                                    @endif
                                @endif
                            @endauth

                        </li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                    <div class="ps-md-1-9">
                        <h5 class="" style="color: #ffff">Social Media Links</h5>
                        <ul class="list-unstyled d-flex gap-3">
                            <li>
                                <a href="mailto:your-{{$settingsData->email}}" target="_blank">
                                    <i class="fas fa-envelope"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/gmail.png') }}" height="40" width="40" alt="Email"> --}}
    
                                </a>
                            </li>
                            <li>
                                <a href="https://t.me/mppscmainsorbit"  target="_blank">
                                    <i class="fab fa-telegram"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" height="40" width="40" alt="Telegram"> --}}
    
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/{{$settingsData->whatsapp}}"  target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/whatsapp.png') }}" alt="WhatsApp" height="40" width="40"> --}}
    
                                </a>
    
                            </li>
                            <li>
                                <a href="tel:+{{$settingsData->mobile}}">
                                    <i class="fas fa-phone"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/telephone.png') }}" height="40" width="40" alt="Phone"> --}}
    
                                </a>
                            </li>
                            <li>
                                <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q"  target="_blank">
                                    <i class="fab fa-youtube"></i>
                                    {{-- <img src="{{ asset('/assets/front/img/logos/youtybe.png') }}" height="40" width="40" alt="YouTube"> --}}
    
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

    {{-- <div class="buy-theme alt-font d-none d-lg-inline-block">
        <a href="" target="_blank">
            <i class="fab fa-telegram"></i> 
            <span>Join Telegram</span>
        </a>
    </div> --}}

    <div class="buy-theme alt-font d-block">
        @auth
            @if(Auth::user()->state == 'cg')
                <a href="https://t.me/mainsorbit_cgpsc" target="_blank">
                    <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            @elseif(Auth::user()->state == 'mp')
                <a href="https://t.me/mainsorbit_mppsc" target="_blank">
                    <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            @else
                <a href="" target="_blank">
                    <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            @endif
        @else
            @if(Session::has('selected_state'))
                @if(Session::get('selected_state') == 'cg')
                    <a href="https://t.me/mainsorbit_cgpsc" target="_blank">
                        <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                        <span>Join Telegram</span>
                    </a>
                @elseif(Session::get('selected_state') == 'mp')
                    <a href="https://t.me/mainsorbit_mppsc" target="_blank">
                        <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                        <span>Join Telegram</span>
                    </a>
                @else
                    <a href="https://t.me/mainsorbit_cgpsc" target="_blank">
                        <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                        <span>Join Telegram</span>
                    </a>
                @endif
            @else
                <a href="https://t.me/mainsorbit_mppsc" target="_blank">
                    <img src="{{ asset('/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
                    <span>Join Telegram</span>
                </a>
            @endif
        @endauth
    </div>

    {{-- <div class="buy-theme alt-font d-block">
        <a href="https://t.me/mppscmainsorbit" target="_blank">
            <img src="{{ asset('public/assets/front/img/logos/telegram.png') }}" alt="" height="50" width="50">
            <span>Join Telegram</span>
        </a>
    </div> --}}
    {{-- <div class="buy-whatsapp alt-font d-block">
        <a href="https://wa.me/{{$settingsData->whatsapp}}" target="_blank">
            <img src="{{ asset('public/assets/front/img/logos/whatsapp.png') }}" alt="" height="50" width="50">
            <span>Join Telegram</span>
        </a>
    </div>
    <div class="buy-you alt-font d-block">
        <a href="https://youtube.com/@mainsorbit?si=QjqS52vouecH6d0Q" target="_blank">
            <img src="{{ asset('public//assets/front/img/logos/youtybe.png') }}" alt="" height="55" width="55">
            <span>Join Telegram</span>
        </a>
    </div> --}}

    

    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <!-- end scroll to top -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery -->
    <script src="{{asset('/assets/front/js/jquery.min.js')}}"></script>

    <!-- popper js -->
    <script src="{{asset('/assets/front/js/popper.min.js')}}"></script>

    <!-- bootstrap -->
    <script src="{{asset('/assets/front/js/bootstrap.min.js')}}"></script>

    <!-- core.min.js -->
    <script src="{{asset('/assets/front/js/core.min.js')}}"></script>

    <!-- search -->
    <script src="{{asset('/assets/front/search/search.js')}}"></script>

    <!-- custom scripts -->
    <script src="{{asset('/assets/front/js/main.js')}}"></script>

    <!-- form plugins js -->
    <script src="{{asset('/assets/front/quform/js/plugins.js')}}"></script>

    <!-- form scripts js -->
    <script src="{{asset('/assets/front/quform/js/scripts.js')}}"></script>

  
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
    
    {{-- <script>
        function checkLogin(planId) {
             let isLoggedIn = $("#auth_user").val(); 
     
             if (isLoggedIn == "1") {
                 $("#plan_id").val(planId);
                 $("#purchasePlanModal").modal("show");
             } else {
                 alert("Please log in to purchase a plan.");
                 $("#loginModal").modal("show");
             }
         }
     
         $("#purchasePlanForm").submit(function(e) {
             e.preventDefault();
             let formData = $(this).serialize(); 
     
             $.ajax({
                 url: "{{ route('purchase.plan') }}",
                 type: "POST",
                 data: formData,
                 success: function(response) {
                     alert(response.message);
                     $("#purchasePlanModal").modal("hide");
                     if (response.redirect_url) {
                         window.location.href = response.redirect_url;
                     }
                 },
                 error: function(xhr) {
                     alert(xhr.responseJSON.message);
                 }
             });
         });
    </script> --}}

    {{-- <script>
        function checkLogin(planId) {

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
                    url: "{{ route('purchase.plan') }}",
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
                    url: "{{ route('check.active.plan') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
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
                                        url: "{{ route('expire.active.plan') }}",
                                        type: "POST",
                                        data: {
                                            _token: "{{ csrf_token() }}"
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

    </script> --}}

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

</html>