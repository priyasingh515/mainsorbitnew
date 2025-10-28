@extends('front.layouts.master')
@section('title','About')
@section('content')

    <style>
        .page-title-section{
            padding: 9px 0 90px
        }

        @media (max-width: 576px) {
                .about-img img{
                    max-width: 100% !important;
                }
            }
    </style>

    @foreach ($about as $index => $abouts)
            
        @if ($index == 0)
            <section class="aboutus-style-02 bg-light">
                <div class="container">
                    <div class="row align-items-center mt-n1-9">
                        <div class="col-lg-6 col-xl-7 mt-1-9">
                            <div class="text-lg-center position-relative">
                                <div class="about-img">
                                    <img src="{{asset('/public/assets/front/img/about.jpg')}}" alt="..."  class="position-relative z-index-1" style="max-width: 80%">
                                </div>
                                <img src="{{asset('/public/assets/front/img/bg/bg-07.png')}}" class="bg-shape1 d-none d-lg-inline-block" alt="...">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-5 mt-1-9">
                        
                            <h2 class="h1 mb-1-6 text-primary">{{$abouts->title}}</h2>
                            <p>
                                {{$abouts->content}}
                            </p>
                          
                        </div>
                    </div>
                    <div class="shape20">
                        <img src="{{asset('/public/assets/front/img/bg/bg-02.jpg')}}" alt="...">
                    </div>
                    <div class="shape18">
                        <img src="{{asset('/public/assets/front/img/bg/bg-01.jpg')}}" alt="...">
                    </div>
                    <div class="shape21">
                        <img src="{{asset('/public/assets/front/img/bg/bg-03.jpg')}}" alt="...">
                    </div>
                </div>
            </section>
        @endif
       
        @if ($index == 1)
            <section class="py-0">
                <div class="row g-0">
                    <div class="col-lg-12 order-2 order-lg-1">
                        <div class="instructor-content">
                            <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                            <p class="">{!!$abouts->content!!}</p>
                        </div>
                    </div>
                
                </div>
               
            </section>
        @endif

        @if ($index == 2)
            <section class="py-0">
                <div class="row g-0">
                    <div class="col-lg-12 order-2 order-lg-1">
                        <div class="instructor-content">
                            <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                            <p class="">{!!$abouts->content!!}</p>
                        </div>
                    </div>
                    
                </div>
            </section>
        @endif

        @if ($index == 3)
            <section class="py-0">
                <div class="row g-0">
                    <div class="col-lg-12 order-2 order-lg-1">
                        <div class="instructor-content">
                            <h2 class="h2 mb-3">{{$abouts->title}}</h2>
                            <p class="">{!!$abouts->content!!}</p>
                        </div>
                    </div>
                   
                </div>
            </section>
        @endif
    @endforeach
    
@endsection