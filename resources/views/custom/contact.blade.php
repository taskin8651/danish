@extends('custom.master')
@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_box text-center">
                    <h2 class="breadcrumb-title">Contact us</h2>
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div id="main-wrapper">
    <div class="site-wrapper-reveal">

        <!-- Contact Form Section -->
        <div class="contact-us-section-wrappaer section-space--pt_100 section-space--pb_70">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-lg-6">
                        <div class="conact-us-wrap-one mb-30">
                            <h3 class="heading">To make requests for <br>further information, <br>
                                <span class="text-color-primary">contact us</span> via our social channels.</h3>
                            <div class="sub-heading">We just need a couple of hours! <br> No more than 2 working days since receiving your issue ticket.</div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form-wrap">

                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="contact-form">

                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <input name="name" type="text" placeholder="Name *" required>
                                        </div>
                                        <div class="contact-inner">
                                            <input name="email" type="email" placeholder="Email *" required>
                                        </div>
                                    </div>

                                    <div class="contact-inner">
                                        <input name="number" type="text" placeholder="Phone *" required>
                                    </div>

                                    <div class="contact-inner">
    <select name="service_type_id" required>
        <option value="">Select Service Type *</option>
        @foreach($serviceTypes as $type)
            <option value="{{ $type->id }}">{{ $type->title }}</option>
        @endforeach
    </select>
</div>


                                    <div class="contact-inner contact-message">
                                        <textarea name="message" placeholder="Please describe what you need." required></textarea>
                                    </div>

                                    <div class="submit-btn mt-20">
                                        <button class="ht-btn ht-btn-md" type="submit">Send message</button>
                                    </div>

                                    @if(session('success'))
                                        <p class="text-success mt-2">{{ session('success') }}</p>
                                    @endif
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Contact Form Section End -->

        <!-- Contact Info Section -->
        <div class="contact-us-info-wrappaer section-space--pb_100">
            <div class="container">
                <div class="row align-items-center">
                    @if($contact)
                        <div class="col-lg-4 col-md-6">
                            <div class="conact-info-wrap mt-30">
                                <h5 class="heading mb-20">Contact Information</h5>
                                <ul class="conact-info__list">
                                    <li>{{ $contact->address ?? 'No address available' }}</li>
                                    <li><a href="mailto:{{ $contact->email ?? '#' }}" class="hover-style-link text-color-primary">{{ $contact->email ?? 'No email' }}</a></li>
                                    <li><a href="tel:{{ $contact->number ?? '#' }}" class="hover-style-link text-black font-weight--bold">{{ $contact->number ?? '-' }}</a></li>
                                    @if(!empty($contact->url))
                                        <li><a href="{{ $contact->url }}" target="_blank" class="hover-style-link text-color-primary">Website</a></li>
                                    @endif
                                    <li>{{ $contact->time ?? '' }}</li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Contact Info Section End -->

        <!-- Call to Action -->
        <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-7">
                        <div class="cta-content md-text-center">
                            <h3 class="heading">We run all kinds of IT services that vow your <span class="text-color-primary">success</span></h3>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="cta-button-group--two text-center">
                            <a href="#" class="btn btn--white btn-one"><span class="btn-icon me-2"><i class="far fa-comment-alt"></i></span> Let's talk</a>
                            <a href="#" class="btn btn--secondary btn-two"><span class="btn-icon me-2"><i class="fas fa-info-circle"></i></span> Get info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->

    </div>
</div>

@endsection
