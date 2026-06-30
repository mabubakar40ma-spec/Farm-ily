@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Rent Equipment</h1>
    </div>

    <main>
        <!-- Equipment on Rent Section -->
        <section class="equipment-section custom-pt-big">
            <div class="container-fluid">
                <div class="text-center mb-5">
                    <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="Logo" class="section-logo mb-2">
                    <h2 class="fw-bold">Equipment On Rent</h2>
                    <p class="text-muted">Affordable Solutions for Your Farming Needs</p>
                </div>

                <div class="row">
                    @foreach ($equipments as $equipment)
                        <!-- Equipment Card -->
                        <div class="col-xxl-3 col-md-6 col-xl-6 mb-4">
                            <div class="card equipment-card shadow-sm">
                                @if ($equipment->is_available == 1)
                                    <div class="status-tag available">● Available</div>
                                @else
                                    <div class="status-tag booked">● Not Available </div>
                                @endif
                                <img src="{{ asset($equipment->image) }}" alt="Heavy-Duty Tractor" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">{{ truncate($equipment->title) }}</h5>
                                    <p class="card-text text-muted">
                                        <img src="{{ asset('frontend/images/icons/location-icon.svg') }}" alt="location">
                                        {{ $equipment->location->name }}
                                    </p>
                                    <h5 class="card-feat-title">By - {{ $equipment->user->name }}</h5>
                                    <p class="card-text">{{ $equipment->description }}</p>
                                    <h5 class="card-feat-title">Features :</h5>
                                    <ul class="features-list">
                                        {!! $equipment->feature !!}
                                    </ul>
                                    <p class="price">Price: <strong>${{ $equipment->price_per_day }}/day</strong> |
                                        <strong>${{ $equipment->price_per_day }}/week</strong>
                                    </p>
                                    <a href="#" class="btn rent-btn" data-bs-toggle="modal"
                                        data-bs-target="#rentModal{{ $equipment->id }}">Rent Now</a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for each equipment -->
                        <div class="modal fade" id="rentModal{{ $equipment->id }}" tabindex="-1"
                            aria-labelledby="rentModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-popup-hero-picture">
                                        <figure class="mb-0 position-relative">
                                            <img src="{{ asset('frontend/images/modalPicture.webp') }}" alt="">
                                            <div class="carousel-caption">
                                                <h5 class="text-white text-start">get in touch</h5>
                                                <strong class="text-white text-start">we are providing you the best quote
                                                    along
                                                    with exciting offers. If available on your account.</strong>
                                            </div>
                                        </figure>
                                    </div>
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                        <form method="post" action="{{ route('equipment.rent.booking') }}" class="pt-4">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Full Name <sup
                                                        class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Enter your name" name="customer_name" required>
                                            </div>
                                            <input type="hidden" name="equipment_id" value="{{ $equipment->id }}">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address <sup
                                                        class="text-danger">*</sup></label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter your email" name="customer_email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone <sup
                                                        class="text-danger">*</sup></label>
                                                <input type="text" class="form-control" id="phone"
                                                    placeholder="Enter your Phone" name="customer_phone" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Location <span class="text-danger">*</span></label>
                                                <select class="form-control" name="location" required>
                                                    <option value="">Select</option>
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->name }}">{{ $location->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="message" class="form-label">Message</label>
                                                <textarea class="form-control" id="message" name="customer_message" rows="3"
                                                    placeholder="Your message or request..."></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success text-white">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Trusted partners -->
        <section class="trusted-section">
            <div class="container text-center">
                <!-- Section Title -->
                <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="Logo"
                    class="section-logo mb-3">
                <h2 class="fw-bold">Trusted By</h2>

                <!-- Trusted Brands Row -->
                <div class="row justify-content-center align-items-center mt-4 partner-block">
                    <div class="col-6 col-md-2 mb-3">
                        <img src="{{ asset('frontend/images/icons/partner-01.svg') }}" alt="Logo 1"
                            class="trusted-logo grayscale">
                        <img src="{{ asset('frontend/images/shadow.png') }}" alt="shadow"
                            class="image-fluid shadow-img">
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <img src="{{ asset('frontend/images/icons/partner-02.svg') }}" alt="Logo 2"
                            class="trusted-logo grayscale">
                        <img src="{{ asset('frontend/images/shadow.png') }}" alt="shadow"
                            class="image-fluid shadow-img">
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <img src="{{ asset('frontend/images/icons/partner-03.svg') }}" alt="Logo 3"
                            class="trusted-logo">
                        <img src="{{ asset('frontend/images/shadow.png') }}" alt="shadow"
                            class="image-fluid shadow-img">
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <img src="{{ asset('frontend/images/icons/partner-04.svg') }}" alt="Logo 4"
                            class="trusted-logo grayscale">
                        <img src="{{ asset('frontend/images/shadow.png') }}" alt="shadow"
                            class="image-fluid shadow-img">
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <img src="{{ asset('frontend/images/icons/partner-05.svg') }}" alt="PayPal"
                            class="trusted-logo grayscale">
                        <img src="{{ asset('frontend/images/shadow.png') }}" alt="shadow"
                            class="image-fluid shadow-img">
                    </div>
                    <div class="col-6 col-md-2 mb-3">
                        <img src="{{ asset('frontend/images/icons/partner-06.svg') }}" alt="Apple Pay"
                            class="trusted-logo grayscale">
                        <img src="{{ asset('frontend/images/shadow.png') }}" alt="shadow"
                            class="image-fluid shadow-img">
                    </div>
                </div>
            </div>
        </section>

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
                                <a href="#" class="btn custom-btn-color btn-lg">Register As Farmer</a>
                                <a href="#" class="btn custom-trans-btn btn-lg">Register As Buyer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
