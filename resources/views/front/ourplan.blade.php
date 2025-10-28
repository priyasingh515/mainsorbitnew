@extends('front.layouts.master')
@section('title','Our Plan')
@section('content')

<style>
    .page-title-section{
            padding: 9px 0 90px
        }
</style>

        
        <section class="bg-light">
            <div class="container">
                <div class="section-heading">
                    {{-- <span class="sub-title">Plans</span> --}}
                    <h2 class="h1 mb-0">Our Plans</h2>
                </div>
                <div class="row align-items-center g-xl-5 mt-n1-9">
                    @foreach ($plans as $plan)
                        <div class="col-md-6 col-lg-4 mt-1-9">
                            <div class="card card-style4 p-1-9 p-xl-5">
                                <div class="border-bottom pb-1-9 mb-1-9 section-heading">
                                    <span class=" sub-title d-block" >{{$plan->plan_name}}</span>
                                    <h4 class="text-dark display-5 display-xxl-4 mb-0 lh-1 fw-bold">{{$plan->price}}<span class="display-29">/₹</span></h4>
                                </div>
                                <ul class="list-unstyled mb-2-9">
                                    <li class="mb-3"><i class="fas fa-check text-primary me-3"></i>{{$plan->plan_validity}}</li>
                                    <li class="mb-3"><i class="fas fa-checkk text-primary me-3"></i>{{$plan->description_1}}</li>
                                    <li class="mb-3"><i class="fas fa-check text-primary me-3"></i>{{$plan->description_2}}</li>
                                    <li class="mb-3"><i class="fas fa-check text-primary me-3"></i>{{$plan->description_3}}</li>
                                    <li class="mb-3"><i class="fas fa-check text-primary me-3"></i>{{$plan->description_4}}</li>
                                    <li><i class="fas fa-check text-primary me-3"></i>{{$plan->medium}}</li>
                                </ul>
                                <div>
                                    <a href="javascript:void(0);" onclick="checkLogin1({{$plan->id}})" class="butn"><i class="far fa-gem icon-arrow before"></i><span
                                            class="label">Choose Plan</span><i class="far fa-gem icon-arrow after"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <input type="hidden" id="auth_user" value="{{ Auth::check() ? '1' : '0' }}">

                    <div class="modal fade" id="purchasePlanModal" tabindex="-1" aria-labelledby="purchasePlanModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="purchasePlanModalLabel">Enter Your Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="purchasePlanForm">
                                        @csrf
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
                                                    @foreach ($mpDistricts as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                    
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

        {{-- <script>
            function checkLogin(planId) {
                @auth
                    // User is logged in, proceed to purchase plan
                    purchasePlan(planId);
                @endauth
        
                @guest
                    // alert("After login, you can purchase a plan.");
                    Swal.fire({
                        title: "Login Required!",
                        text: "After login, you can purchase a plan.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    }).then(() => {
                        var myModal = new bootstrap.Modal(document.getElementById('loginModal'));
                        myModal.show();
                    });
                @endguest
            }
        
            function purchasePlan(planId) {
                $.ajax({
                    url: "{{ route('purchase.plan') }}",
                    type: "POST",
                    data: {
                        plan_id: planId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(response) {
                        alert(response.responseJSON.message);
                    }
                });
            }
        </script> --}}
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

        </script>
        
       
    
@endsection