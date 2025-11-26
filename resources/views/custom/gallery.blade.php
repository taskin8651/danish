@extends('custom.master')
@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <h1 class="breadcrumb-title text-color-primary">Gallery & Popup Video</h1>
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div id="main-wrapper">
    <div class="site-wrapper-reveal">

        <!-- Service Type Tabs Start -->
       <div class="container section-space--pt_80 section-space--pb_50">
    <ul class="nav nav-tabs justify-content-center" id="galleryTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request('service_type') ? '' : 'active' }}" data-filter="*" href="{{ route('custom.gallery') }}">All</a>
        </li>
        @foreach($serviceTypes as $type)
        <li class="nav-item">
            <a class="nav-link {{ request('service_type') == $type->id ? 'active' : '' }}" 
               data-filter=".type-{{ $type->id }}" 
               href="{{ route('custom.gallery', ['service_type' => $type->id]) }}">
               {{ $type->service_type }}
            </a>
        </li>
        @endforeach
    </ul>
</div>


        <!-- Gallery Start -->
        <div class="container section-space--pt_50 section-space--pb_120">
            <div class="row gallery-grid">
                @foreach($galleries as $gallery)
                <div class="col-lg-4 col-md-6 mb-4 gallery-item type-{{ $gallery->service_type_id }}">
                    <div class="single-popup-wrap text-center">
                        @if($gallery->upload_file)
                        <a href="{{ $gallery->upload_file->getUrl() }}" class="video-link">
                            <img class="img-fluid" src="{{ $gallery->upload_file->getUrl('preview') }}" alt="{{ $gallery->title }}">
                            <div class="ht-popup-video video-overlay">
                                <div class="video-button__one">
                                    <div class="video-play">
                                        <span class="video-play-icon"></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                        <h5 class="mt-2">{{ $gallery->title }}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Gallery End -->

    </div>
</div>

@endsection

@push('scripts')
<script>
    // Isotope filter for gallery
    $(document).ready(function(){
        var $grid = $('.gallery-grid').isotope({
            itemSelector: '.gallery-item',
            layoutMode: 'fitRows'
        });

        $('.nav-tabs a').click(function(e){
            e.preventDefault();
            var filterValue = $(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });

            $('.nav-tabs a').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endpush
