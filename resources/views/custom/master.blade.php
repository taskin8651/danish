@php 
use App\Models\Logo;
use App\Models\ContactDetail;
use App\Models\ServiceDetail;
use App\Models\Link;

$siteSetting = Logo::first();
$serviceDetails = ServiceDetail::all();
$contactDetails = ContactDetail::first();
$links = Link::first();

@endphp

 

<!DOCTYPE html>
<html class="no-js" lang="zxx" dir="ltr">


<!-- Mirrored from htmldemo.net/mitech/index-machine-learning.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Nov 2025 07:51:42 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mitech - Technology IT Solutions HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Technology IT Solutions HTML Template">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.webp') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS ============================================ -->

    <!-- Font Family CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor & Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/plugins.min.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>


<body>

    <!-- <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div> -->











    <!--====================  header area ====================-->
    <div class="header-area header-area--absolute">
        <div class="header-bottom-wrap header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header position-relative">
                            <!-- brand logo -->
                           <div class="header__logo">
    <a href="{{ url('/') }}">
        <img src="{{ $siteSetting->image_1?->getUrl() ?? 'assets/images/logo/light-logo.webp' }}" 
             aria-label="Mitech Logo" 
             width="160" 
             height="48" 
             class="img-fluid light-logo" 
             alt="Light Logo">

        <img src="{{ $siteSetting->image_1?->getUrl() ?? 'assets/images/logo/light-logo.webp' }}" 
             aria-label="Mitech Logo" 
             width="160" 
             height="48" 
             class="img-fluid dark-logo" 
             alt="Dark Logo">
    </a>
</div>

                            <div class="header-right">
                                <!-- navigation menu -->
                                <div class="header__navigation menu-style-four d-none d-xl-block">
                                    <nav class="navigation-menu">

                                        <ul>
                                            <li class="">
                                                <a href="/"><span>Home</span></a>
                                              
                                            </li>
                                            <li class="">
                                                <a href="#"><span>About</span></a>
                                              
                                            </li>
                                            <li class="has-children has-children--multilevel-submenu">
                                                <a href="/services"><span>Service</span></a>
                                                <ul class="submenu">
                                                    @foreach($serviceDetails as $serviceDetail)
                                                    <li class="has-children">
                                                        <a href="{{ route('custom.serviceDetail', $serviceDetail->id) }}">
                                                            <span>{{ $serviceDetail->title }}</span></a>
                                                        </li>
                                                    @endforeach
                                                   
                                                </ul>
                                            </li>
                                          
                                         <li class="">
                                                <a href="/gallery"><span>Gallery</span></a>
                                              
                                            </li>
                                            <li class="">
                                                <a href="/contact"><span>Contact</span></a>
                                              
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="header-search-form-two white-icon">
                                    <form action="#" class="search-form-top-active">
                                        <div class="search-icon" id="search-overlay-trigger">
                                            <a href="#">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                    </form>
                                </div>

                                <!-- mobile menu -->
                                <div class="mobile-navigation-icon white-md-icon d-block d-xl-none" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--====================  End of header area  ====================-->

@yield('content')




        <!--====================  footer area ====================-->
        <div class="footer-area-wrapper bg-gray">
            <div class="footer-area section-space--ptb_80">
                <div class="container">
                    <div class="row footer-widget-wrapper">
                       
<div class="col-lg-3 col-md-6 col-sm-6 footer-widget">
    <div class="footer-widget__logo mb-30">
        <img src="{{ $siteSetting->logo ?? 'https://via.placeholder.com/160x48' }}" 
             width="160" height="48" class="img-fluid" alt="Logo">
    </div>
    @if($contactDetails)
    <ul class="footer-widget__list">
        <li>{{ $contactDetails->address ?? 'No address available' }}</li>
        <li>
            <a href="mailto:{{ $contactDetails->email ?? '#' }}" class="hover-style-link">
                {{ $contactDetails->email ?? 'No email' }}
            </a>
        </li>
        <li>
            <a href="tel:{{ $contactDetails->number ?? '#' }}" class="hover-style-link text-black font-weight--bold">
                {{ $contactDetails->number ?? '-' }}
            </a>
        </li>
       
    </ul>
    @endif
</div>
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                            <h6 class="footer-widget__title mb-20">Services</h6>
                            <ul class="footer-widget__list">
                                @foreach($serviceDetails as $serviceDetail)
                                <li><a href="{{ route('custom.serviceDetail', $serviceDetail->id) }}" class="hover-style-link">{{ $serviceDetail->title }}</a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                            <h6 class="footer-widget__title mb-20">Quick links</h6>
                            <ul class="footer-widget__list">
                                <li><a href="/" class="hover-style-link">Home</a></li>
                                <li><a href="#" class="hover-style-link">About Us</a></li>
                                <li><a href="/service" class="hover-style-link">Services</a></li>
                                <li><a href="/gallery" class="hover-style-link">Gallery</a></li>
                                <li><a href="/contact" class="hover-style-link">Contact Us</a></li>
                               
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                            <h6 class="footer-widget__title mb-20">Support</h6>
                            <ul class="footer-widget__list">
                                <li><a href="/privacy" class="hover-style-link">Privacy & policy</a></li>
                                <li><a href="/terms" class="hover-style-link">Terms & conditions</a></li>
                                
                                
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 footer-widget">
    <div class="footer-widget__title section-space--mb_30">Our Location</div>

    @if($contactDetails && $contactDetails->url)
        <div class="footer-map">
            <iframe 
                src="{{ $contactDetails->url }}" 
                width="100%" 
                height="200" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    @else
        <p>Map not available</p>
    @endif
</div>

                    </div>
                </div>
            </div>
            <div class="footer-copyright-area section-space--pb_30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start">
                            <span class="copyright-text">&copy; 2025 Clickmint Agency. <a href="https://clickmintagency.in/">All Rights Reserved.</a></span>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
    <ul class="list ht-social-networks solid-rounded-icon">
        @if($links)
            @if($links->facebook)
                <li class="item">
                    <a href="{{ $links->facebook }}" target="_blank" aria-label="Facebook" class="social-link hint--bounce hint--top hint--primary">
                        <i class="fab fa-facebook-f link-icon"></i>
                    </a>
                </li>
            @endif

            @if($links->instragram)
                <li class="item">
                    <a href="{{ $links->instragram }}" target="_blank" aria-label="Instagram" class="social-link hint--bounce hint--top hint--primary">
                        <i class="fab fa-instagram link-icon"></i>
                    </a>
                </li>
            @endif

            @if($links->linkedin)
                <li class="item">
                    <a href="{{ $links->linkedin }}" target="_blank" aria-label="Linkedin" class="social-link hint--bounce hint--top hint--primary">
                        <i class="fab fa-linkedin link-icon"></i>
                    </a>
                </li>
            @endif

            @if($links->youtube)
                <li class="item">
                    <a href="{{ $links->youtube }}" target="_blank" aria-label="YouTube" class="social-link hint--bounce hint--top hint--primary">
                        <i class="fab fa-youtube link-icon"></i>
                    </a>
                </li>
            @endif
        @endif
    </ul>
</div>

                    </div>
                </div>
            </div>
        </div>
        <!--====================  End of footer area  ====================-->












    </div>
    <!-- Start Toolbar -->
    <div class="demo-option-container">
        <!-- Start Toolbar -->
        <div class="aeroland__toolbar">
            <div class="inner">
                <a class="quick-option hint--bounce hint--left hint--black primary-color-hover-important" href="#" aria-label="Quick Options">
                    <i class="fas fa-project-diagram"></i>
                </a>
                <a class="hint--bounce hint--left hint--black primary-color-hover-important" target="_blank" href="https://hasthemes.com/contact-us/" aria-label="Support Center">
                    <i class="far fa-life-ring"></i>
                </a>
                <a class="hint--bounce hint--left hint--black primary-color-hover-important" target="_blank" href="https://1.envato.market/c/417168/275988/4415?subId1=hastheme&amp;subId2=mitech-preview&amp;subId3=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F24906742%3Flicense%3Dregular%26size%3Dsource&amp;u=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F24906742%3Flicense%3Dregular%26size%3Dsource" aria-label="Purchase Mitech">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
        <!-- End Toolbar -->
        <!-- Start Quick Link -->
        <div class="demo-option-wrapper">
            <div class="demo-panel-header">
                <div class="title">
                    <h6 class="heading mt-30">IT Solutions Mitech - Technology, IT Solutions & Services Html5 Template</h6>
                </div>

                <div class="panel-btn mt-20">
                    <a class="ht-btn ht-btn-md" href="https://1.envato.market/c/417168/275988/4415?subId1=hastheme&amp;subId2=mitech-preview&amp;subId3=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F24906742%3Flicense%3Dregular%26size%3Dsource&amp;u=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F24906742%3Flicense%3Dregular%26size%3Dsource"><i class="fa fa-shopping-cart me-2"></i> Buy Now </a>
                </div>
            </div>
            <div class="demo-quick-option-list">
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-appointment.html" aria-label="Appointment">
                    <img class="img-fluid" src="assets/images/demo-images/home-01.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-infotechno.html" aria-label="Infotechno">
                    <img class="img-fluid" src="assets/images/demo-images/home-02.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-processing.html" aria-label="Processing">
                    <img class="img-fluid" src="assets/images/demo-images/home-03.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-services.html" aria-label="Services">
                    <img class="img-fluid" src="assets/images/demo-images/home-04.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-resolutions.html" aria-label="Resolutions">
                    <img class="img-fluid" src="assets/images/demo-images/home-05.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-cybersecurity.html" aria-label="Cybersecurity">
                    <img class="img-fluid" src="assets/images/demo-images/home-06.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-modern-it-company.html" aria-label="Modern IT Company">
                    <img class="img-fluid" src="assets/images/demo-images/modern-it-company.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-machine-learning.html" aria-label="Machine Learning">
                    <img class="img-fluid" src="assets/images/demo-images/machine-learning.webp" alt="Images">
                </a>
                <a class="link hint--bounce hint--black hint--top hint--dark" href="index-software-innovation.html" aria-label="Software Innovation">
                    <img class="img-fluid" src="assets/images/demo-images/software-innovation.webp" alt="Images">
                </a>
            </div>
        </div>
        <!-- End Quick Link -->
    </div>
    <!-- End Toolbar -->
    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top fas fa-chevron-up"></i>
        <i class="arrow-bottom fas fa-chevron-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->

    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-8">
                            <!-- logo -->
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ $siteSetting->image_1?->getUrl() ?? 'assets/images/logo/light-logo.webp' }}" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-4">
                            <!-- mobile menu content -->
                            <div class="mobile-menu-content text-end">
                                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-overlay__body">
                <nav class="offcanvas-navigation">
                     <ul>
                                            <li class="">
                                                <a href="/"><span>Home</span></a>
                                              
                                            </li>
                                            <li class="">
                                                <a href="#"><span>About</span></a>
                                              
                                            </li>
                                            <li class="has-children has-children--multilevel-submenu">
                                                <a href="/services"><span>Service</span></a>
                                                <ul class="submenu">
                                                    @foreach($serviceDetails as $serviceDetail)
                                                    <li class="has-children">
                                                        <a href="{{ route('custom.serviceDetail', $serviceDetail->id) }}">
                                                            <span>{{ $serviceDetail->title }}</span></a>
                                                        </li>
                                                    @endforeach
                                                   
                                                </ul>
                                            </li>
                                          
                                         <li class="">
                                                <a href="/gallery"><span>Gallery</span></a>
                                              
                                            </li>
                                            <li class="">
                                                <a href="/contact"><span>Contact</span></a>
                                              
                                            </li>
                                        </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--====================  End of mobile menu overlay  ====================-->







    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6 ms-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <form action="#">
                        <input type="text" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->











    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
<script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

<!-- jQuery JS -->
<script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>

<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>


<!-- Mirrored from htmldemo.net/mitech/index-machine-learning.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Nov 2025 07:51:44 GMT -->
</html>