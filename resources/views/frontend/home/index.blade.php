@extends('frontend.layouts.master')

@section('content')
    <div class="hero-section">
        <!-- Hero Content -->
        <div class="container text-center hero-content home-main-content">
            <h1 class="hero-title">Connecting Farmers<br>and Buyers Seamlessly</h1>
            <div class="d-flex justify-content-center hero-sec-btn mt-4">
                <a href="{{ route('farmer.register') }}" class="btn custom-btn-color btn-lg">Register As Farmer </a>
                <a href="{{ route('register') }}" class="btn custom-trans-btn btn-lg">Register As Buyer </a>
            </div>
        </div>

        <!-- Hero border -->
        <div class="hero-border">
            <img src="{{ asset('frontend/images/image-divider.webp') }}" alt="image-divider" class="img-fluid">
        </div>
    </div>

    <main>
        <!-- Search Section -->
        @include('frontend.home.sections.search')

        <!-- Farming Listing Section -->
        @include('frontend.home.sections.farmer-listing')

        <!-- Why choose us -->

        @include('frontend.home.sections.why-choose-us')
        <!-- How it works Section -->
        @include('frontend.home.sections.how-it-work')

        <!-- Testimonical Section -->

        @include('frontend.home.sections.testimonial')

        <!-- Blog Section -->
        @include('frontend.home.sections.blog')

        <!-- Equipment on Rent Section -->

        @include('frontend.home.sections.equipment')

        <!-- Our Commitment To Inclusivity -->

        @include('frontend.home.sections.our-commitment')

        <!-- Trusted partners -->
        @include('frontend.home.sections.trusted-partner')

        <!--Call to Action Section-->
        <section class="cta-section">
            <div class="container py-5">
                <div class="cta-section-inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Main Heading -->
                            <h2 class="cta-title">A Subtle Background Image Of Crops Or A Marketplace.</h2>
                            <!-- Subheading -->
                            <p class="cta-subtitle mt-3">Ready to Join? Start Your Journey Today!</p>
                        </div>

                        <div class="col-lg-4">
                            <!-- CTA Buttons -->
                            <div class="cta-buttons mt-4">
                                <a href="{{ route('farmer.register') }}" class="btn custom-btn-color btn-lg">Register As
                                    Farmer</a>
                                <a href="{{ route('register') }}" class="btn custom-trans-btn btn-lg">Register As Buyer</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
