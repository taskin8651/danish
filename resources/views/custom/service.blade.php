@extends('custom.master')
@section('content')







    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">IT Services</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">IT Services</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->












    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <!--===========  feature-images-wrapper  Start =============-->
            <div class="feature-images-wrapper section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                                <h3 class="heading">Preparing for your success, <br> we provide <span class="text-color-primary">  truly prominent IT solutions.</span></h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="feature-images__one">
                                <div class="row">

                                 
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 wow move-up">
                    <div class="ht-box-images style-01">
                        <div class="image-box-wrap">

                            <div class="box-image">
                                <img class="img-fluid" 
                                     src="{{ $service->upload_image?->url ?? asset('assets/images/default-service.png') }}" 
                                     alt="{{ $service->title }}">
                            </div>

                            <div class="content">
                                <h5 class="heading">{{ $service->title }}</h5>

                                <div class="text">
                                    {{ $service->short_description }}
                                </div>

                                <div class="circle-arrow">
                                    <div class="middle-dot"></div>
                                    <div class="middle-dot dot-2"></div>
                                   <a href="{{ route('custom.serviceDetail', $service->id) }}">
    <i class="fas fa-arrow-right"></i>
</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
                                  

                                </div>
                            </div>

                            <div class="section-under-heading text-center section-space--mt_80">Challenges are just opportunities in disguise. <a href="#">Take the challenge!</a></div>

                        </div>
                    </div>
                </div>
            </div>
            <!--===========  feature-images-wrapper  End =============-->
            <!--============ Contact Us Area Start =================-->
            <div class="contact-us-area infotechno-contact-us-bg section-space--pt_100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="image">
                                <img class="img-fluid" src="assets/images/banners/home-cybersecurity-contact-bg-image.webp" alt="">
                            </div>
                        </div>

                        <div class="col-lg-4 ms-auto">
                            <div class="contact-info style-two text-left">

                                <div class="contact-info-title-wrap text-center">
                                    <h3 class="heading  mb-10">4.9/5.0</h3>
                                    <div class="ht-star-rating lg-style">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <p class="sub-text">by 700+ customers for 3200+ clients</p>
                                </div>

                                <div class="contact-list-item">
                                    <a href="tel:190068668" class="single-contact-list">
                                        <div class="content-wrap">
                                            <div class="content">
                                                <div class="icon">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                                <div class="main-content">
                                                    <h6 class="heading">Call for advice now!</h6>
                                                    <div class="text">{{ $contact->number ?? '-' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="mailto:hello@mitech.com" class="single-contact-list">
                                        <div class="content-wrap">
                                            <div class="content">
                                                <div class="icon">
                                                    <span class="far fa-envelope"></span>
                                                </div>
                                                <div class="main-content">
                                                    <h6 class="heading">Say hello</h6>
                                                    <div class="text">{{ $contact->email ?? 'email' }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--============ Contact Us Area End =================-->

        </div>


@endsection