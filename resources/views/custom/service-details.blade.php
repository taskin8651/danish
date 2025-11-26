@extends('custom.master')
@section('content')


<div id="main-wrapper">
    <div class="site-wrapper-reveal">

        <!-- Banner Section -->
        <div class="about-banner-wrap banner-space bg-img position-relative"
     data-bg="{{ $service->upload_image?->url ?? asset('assets/images/bg/managed-it-services-hero-bg.webp') }}">

    <!-- Overlay (Opacity Layer) -->
    <div class="overlay" 
         style="position:absolute; top:0; left:0; width:100%; height:100%;
                background:rgba(0,0,0,0.55); z-index:1;">
    </div>

    <div class="container" style="position: relative; z-index:2;">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="about-banner-content text-center">

                    <h1 class="mb-15 text-white">{{ $service->title }}</h1>

                    <h5 class="font-weight--normal text-white">
                        {{ $service->short_description ?? 'Reliable IT services for your business.' }}
                    </h5>

                </div>
            </div>
        </div>
    </div>
</div>


        <!-- Content Section -->
        <div class="feature-large-images-wrapper section-space--ptb_100"><div class="container">
    <div class="cybersecurity-about-box">

        <!-- Tabs Header -->
        <ul class="nav nav-tabs" id="serviceTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab">
                    Overview
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="project-tab" data-bs-toggle="tab" href="#projects" role="tab">
                    Projects ({{ $service->projects->count() }})
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#reviews" role="tab">
                    Reviews ({{ $service->reviews->count() }})
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="payment-tab" data-bs-toggle="tab" href="#payments" role="tab">
                    Payments ({{ $service->payments->count() }})
                </a>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content mt-4" id="serviceTabContent">

            <!-- OVERVIEW TAB -->
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                <h3 class="heading mt-30">{{ $service->title }}</h3>
                <p class="sub-heading">{!! $service->description !!}</p>
            </div>

          <!-- PROJECTS TAB -->
<div class="tab-pane fade" id="projects" role="tabpanel">

    @if($service->projects->count() == 0)

        <p>No projects available.</p>

    @else

        <!-- FILTER BUTTONS -->
        <div class="mb-4">
            <button class="btn btn-outline-primary btn-sm filter-btn" data-filter="all">
                All
            </button>

            @foreach($types as $type)
                <button class="btn btn-outline-primary btn-sm filter-btn" 
                        data-filter="type-{{ $type->id }}">
                    {{ $type->service_type }}
                </button>
            @endforeach
        </div>

      <!-- PROJECT GRID -->
<div class="row" id="project-list">

<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

@foreach($service->projects as $project)
<div class="col-lg-4 col-md-6 mb-4 project-item type-{{ $project->service_type_id }}">

    <div class="card shadow-sm h-100 border-0 rounded">

        @php
            $file = $project->upload_file;       // Media object
            $url  = $file ? $file->getUrl() : null;  // Correct URL
            $ext  = $file ? strtolower($file->extension) : null;
            $isVideo = in_array($ext, ['mp4','mov','webm','avi']);
        @endphp

        <!-- Media Wrapper -->
        <div class="position-relative">

            @if($file)
                @if($isVideo)
                    <a data-fancybox="gallery" href="{{ $url }}">
                        <video class="card-img-top" style="height:180px; object-fit:cover;" muted>
                            <source src="{{ $url }}" type="video/{{ $ext }}">
                        </video>
                    </a>
                @else
                    <a data-fancybox="gallery" href="{{ $url }}">
                        <img src="{{ $url }}" 
                             class="card-img-top"
                             style="height:180px; object-fit:cover;">
                    </a>
                @endif
            @else
                <a data-fancybox="gallery" href="https://via.placeholder.com/800x600?text=Project">
                    <img src="https://via.placeholder.com/300x180?text=Project" 
                         class="card-img-top"
                         style="height:180px; object-fit:cover;">
                </a>
            @endif

            <!-- 🔥 Title Overlay -->
            <div style="
                position:absolute;
                bottom:0;
                left:0;
                width:100%;
                background:rgba(0,0,0,0.55);
                color:#fff;
                padding:6px 10px;
                font-size:16px;
                font-weight:600;
            ">
                {{ $project->title ?? 'Untitled Project' }}
            </div>

        </div>

        
    </div>

   
</div>
@endforeach

</div>


    @endif
</div>
<script>
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function () {

            let filter = this.getAttribute('data-filter');

            document.querySelectorAll('.project-item').forEach(item => {

                if (filter === 'all') {
                    item.style.display = 'block';
                } else {
                    if (item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }

            });
        });
    });
</script>

<style>
    .review-filter {
        padding: 8px 18px;
        margin-right: 8px;
        margin-bottom: 6px;
        border: 1px solid #007bff;
        border-radius: 25px;
        background: white;
        color: #007bff;
        cursor: pointer;
        font-size: 14px;
        transition: 0.3s;
        display: inline-block;
    }

    .review-filter:hover {
        background: #007bff;
        color: #fff;
    }

    .review-filter.active {
        background: #007bff;
        color: #fff;
    }

    #reviews-list li {
        padding: 10px 0;
        list-style: none;
    }
</style>


         <div class="tab-pane fade" id="reviews" role="tabpanel">

    @if($service->reviews->count() == 0)
        <p>No reviews available.</p>

    @else

        <!-- FILTER BUTTONS -->
        <div class="mb-3">
            <button class="review-filter active" data-type="all">All</button>

            @foreach($types as $type)
                <button class="review-filter"
                        data-type="{{ $type->id }}">
                    {{ $type->service_type }}
                </button>
            @endforeach
        </div>

        <div class="row" id="reviews-list">
    @foreach($service->reviews as $review)
        <div class="col-lg-4 col-md-6 mb-4 review-item"
             data-type="{{ $review->service_type_id }}">

            <div class="testimonial-slider__one wow move-up p-3"
                 style="border:1px solid #eee; border-radius:10px; background:#fff;">

                <div class="testimonial-slider--info d-flex align-items-center">

                    <div class="testimonial-slider__media me-3">
                        <img src="{{ $review->image?->url ?? asset('assets/images/default-user.png') }}"
                             width="70" height="70"
                             style="border-radius:50%; object-fit:cover;">
                    </div>

                    <div class="testimonial-slider__author">
                        <div class="testimonial-rating">
                            @for($i = 1; $i <= 5; $i++)
    @if($i <= $review->rate)
        <span class="fa fa-star text-warning"></span>
    @else
        <span class="fa-regular fa-star"></span>
        
    @endif
@endfor

                        </div>

                        <div class="author-info">
                            <h6 class="name">{{ $review->name ?? 'Unnamed User' }}</h6>
                            <span class="designation">
                                {{ $review->service_type?->service_type ?? 'General' }}
                            </span>
                        </div>
                    </div>

                </div>

                <div class="testimonial-slider__text mt-3">
                    {{ $review->description ?? 'No description available.' }}
                </div>

            </div>

        </div>
    @endforeach
</div>


    @endif
</div>
<script>
    $(document).on("click", ".review-filter", function () {

        $(".review-filter").removeClass("active");
        $(this).addClass("active");

        let type = $(this).data("type");

        if (type === "all") {
            $(".review-item").show();
        } else {
            $(".review-item").hide();
            $(`.review-item[data-type="${type}"]`).show();
        }
    });
</script>


           <!-- PAYMENTS TAB -->
<div class="tab-pane fade" id="payments" role="tabpanel">

    <!-- Load Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    @if($service->payments->count() == 0)
        <p>No payment history.</p>

    @else

        <div class="row">

            @foreach($service->payments as $payment)

                @php
                    $media = $payment->upload_file; // Spatie Media
                    $url   = $media ? $media->getUrl() : null;
                    $ext   = $media ? strtolower($media->extension) : null;
                    $isVideo = in_array($ext, ['mp4','mov','webm','avi']);
                @endphp

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card shadow-sm border-0 rounded h-100">

                        <!-- MEDIA PREVIEW -->
                        <div class="position-relative">

                            @if($media)
                                @if($isVideo)
                                    <a data-fancybox="payment-gallery" href="{{ $url }}">
                                        <video class="card-img-top"
                                               style="height:180px; object-fit:cover;" muted>
                                            <source src="{{ $url }}" type="video/{{ $ext }}">
                                        </video>
                                    </a>
                                @else
                                    <a data-fancybox="payment-gallery" href="{{ $url }}">
                                        <img src="{{ $url }}"
                                             class="card-img-top"
                                             style="height:180px; object-fit:cover;">
                                    </a>
                                @endif
                            @else
                                <img src="https://via.placeholder.com/300x180?text=No+File"
                                     class="card-img-top"
                                     style="height:180px; object-fit:cover;">
                            @endif

                            <!-- OVERLAY AMOUNT -->
                            <div style="
                                position:absolute;
                                bottom:0;
                                left:0;
                                width:100%;
                                background:rgba(0,0,0,0.6);
                                color:#fff;
                                padding:6px 10px;
                                font-size:15px;
                                font-weight:600;">
                                 <strong>{{ $payment->title ?? 'Payment Entry' }}</strong>
                                   Date: {{ $payment->created_at->format('d M, Y') }}

                            </div>

                        </div>

                       

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>


        </div>

    </div>
</div>


    </div>
</div>


           

         
            <!--========= Pricing Table Area Start ==========-->
            <!-- <div class="pricing-table-area section-space--ptb_100 bg-gray">
                <div class="pricing-table-title-area position-relative">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title-wrapper text-center section-space--mb_40 wow move-up">
                                    <h6 class="section-sub-title mb-20">Style 01</h6>
                                    <h3 class="section-title">Affordable price plans<span class="text-color-primary"> for you!</span> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pricing-table-content-area">
                    <div class="container">

                        <div class="row">
                            <div class="col-12 text-center wow move-up">
                                <ul class="nav justify-content-center ht-plans-menu  section-space--mb_60" role="tablist">
                                    <li class="tab__item nav-item active">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#month-tab" role="tab" aria-selected="true">Per month</a>
                                    </li>
                                    <li class="tab__item nav-item ">
                                        <a class="nav-link" data-bs-toggle="tab" href="#year-tab" role="tab" aria-selected="false">Per year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content ht-tab__content wow move-up">
                            <div class="tab-pane fade show active" id="month-tab" role="tabpanel">
                                <div class="row pricing-table-one">
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 pricing-table">
                                        <div class="pricing-table__inner">
                                            <div class="pricing-table__header">
                                                <h6 class="sub-title">Basic</h6>
                                                <div class="pricing-table__image">
                                                    <img src="assets/images/icons/mitech-pricing-box-icon-01-90x90.webp" class="img-fluid" alt="">
                                                </div>
                                                <div class="pricing-table__price-wrap">
                                                    <h6 class="currency">$</h6>
                                                    <h6 class="price">19</h6>
                                                    <h6 class="period">/mo</h6>
                                                </div>
                                            </div>
                                            <div class="pricing-table__body">
                                                <div class="pricing-table__footer">
                                                    <a href="#" class="ht-btn ht-btn-md ht-btn--outline">Get started</a>
                                                </div>
                                                <ul class="pricing-table__list text-left">
                                                    <li>03 projects</li>
                                                    <li>Quality &amp; Customer Experience</li>
                                                    <li><span class="featured">Try for free, forever!</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 pricing-table pricing-table--popular">
                                        <div class="pricing-table__inner">
                                            <div class="pricing-table__feature-mark">
                                                <span>Popular Choice</span>
                                            </div>
                                            <div class="pricing-table__header">
                                                <h6 class="sub-title">Professional</h6>
                                                <div class="pricing-table__image">
                                                    <img src="assets/images/icons/mitech-pricing-box-icon-02-88x88.webp" class="img-fluid" alt="">
                                                </div>
                                                <div class="pricing-table__price-wrap">
                                                    <h6 class="currency">$</h6>
                                                    <h6 class="price">59</h6>
                                                    <h6 class="period">/mo</h6>
                                                </div>
                                            </div>
                                            <div class="pricing-table__body">
                                                <div class="pricing-table__footer">
                                                    <a href="#" class="ht-btn  ht-btn-md ">Get started</a>
                                                </div>
                                                <ul class="pricing-table__list text-left">
                                                    <li>Unlimited project</li>
                                                    <li>Power And Predictive Dialing</li>
                                                    <li>Quality &amp; Customer Experience</li>
                                                    <li>24/7 phone and email support</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 pricing-table">
                                        <div class="pricing-table__inner">
                                            <div class="pricing-table__header">
                                                <h6 class="sub-title">Professional</h6>
                                                <div class="pricing-table__image">
                                                    <img src="assets/images/icons/mitech-pricing-box-icon-03-90x90.webp" class="img-fluid" alt="">
                                                </div>
                                                <div class="pricing-table__price-wrap">
                                                    <h6 class="currency">$</h6>
                                                    <h6 class="price">29</h6>
                                                    <h6 class="period">/mo</h6>
                                                </div>
                                            </div>
                                            <div class="pricing-table__body">
                                                <div class="pricing-table__footer">
                                                    <a href="#" class="ht-btn ht-btn-md ht-btn--outline">Get started</a>
                                                </div>
                                                <ul class="pricing-table__list text-left">
                                                    <li>10 projects</li>
                                                    <li>Power And Predictive Dialing </li>
                                                    <li>Quality &amp; Customer Experience </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="year-tab" role="tabpanel">

                                <div class="row pricing-table-one">
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 pricing-table">
                                        <div class="pricing-table__inner">
                                            <div class="pricing-table__header">
                                                <h6 class="sub-title">Basic</h6>
                                                <div class="pricing-table__image">
                                                    <img src="assets/images/icons/mitech-pricing-box-icon-01-90x90.webp" class="img-fluid" alt="">
                                                </div>
                                                <div class="pricing-table__price-wrap">
                                                    <h6 class="currency">$</h6>
                                                    <h6 class="price">199</h6>
                                                    <h6 class="period">/mo</h6>
                                                </div>
                                            </div>
                                            <div class="pricing-table__body">
                                                <div class="pricing-table__footer">
                                                    <a href="#" class="ht-btn ht-btn-md ht-btn--outline">Get started</a>
                                                </div>
                                                <ul class="pricing-table__list text-left">
                                                    <li>03 projects</li>
                                                    <li>Quality &amp; Customer Experience</li>
                                                    <li><span class="featured">Try for free, forever!</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 pricing-table pricing-table--popular">
                                        <div class="pricing-table__inner">
                                            <div class="pricing-table__feature-mark">
                                                <span>Popular Choice</span>
                                            </div>
                                            <div class="pricing-table__header">
                                                <h6 class="sub-title">Professional</h6>
                                                <div class="pricing-table__image">
                                                    <img src="assets/images/icons/mitech-pricing-box-icon-02-88x88.webp" class="img-fluid" alt="">
                                                </div>
                                                <div class="pricing-table__price-wrap">
                                                    <h6 class="currency">$</h6>
                                                    <h6 class="price">599</h6>
                                                    <h6 class="period">/mo</h6>
                                                </div>
                                            </div>
                                            <div class="pricing-table__body">
                                                <div class="pricing-table__footer">
                                                    <a href="#" class="ht-btn  ht-btn-md ">Get started</a>
                                                </div>
                                                <ul class="pricing-table__list text-left">
                                                    <li>Unlimited project</li>
                                                    <li>Power And Predictive Dialing</li>
                                                    <li>Quality &amp; Customer Experience</li>
                                                    <li>24/7 phone and email support</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 pricing-table">
                                        <div class="pricing-table__inner">
                                            <div class="pricing-table__header">
                                                <h6 class="sub-title">Professional</h6>
                                                <div class="pricing-table__image">
                                                    <img src="assets/images/icons/mitech-pricing-box-icon-03-90x90.webp" class="img-fluid" alt="">
                                                </div>
                                                <div class="pricing-table__price-wrap">
                                                    <h6 class="currency">$</h6>
                                                    <h6 class="price">299</h6>
                                                    <h6 class="period">/mo</h6>
                                                </div>
                                            </div>
                                            <div class="pricing-table__body">
                                                <div class="pricing-table__footer">
                                                    <a href="#" class="ht-btn ht-btn-md ht-btn--outline">Get started</a>
                                                </div>
                                                <ul class="pricing-table__list text-left">
                                                    <li>10 projects</li>
                                                    <li>Power And Predictive Dialing </li>
                                                    <li>Quality &amp; Customer Experience </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--========= Pricing Table Area End ==========-->










            <!--========== Call to Action Area Start ============-->
            <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_one">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content md-text-center">
                                <h3 class="heading text-white">We run all kinds of IT services that vow your <span class="text-color-secondary"> success</span></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="cta-button-group--one text-center">
                                <a href="/about" class="btn btn--white btn-one"><span class="btn-icon me-2"><i class="far fa-comment-alt"></i></span> Let's talk</a>
                                <a href="/contact" class="btn btn--secondary  btn-two"><span class="btn-icon me-2"><i class="fas fa-info-circle"></i></span> Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========== Call to Action Area End ============-->

        </div>

@endsection