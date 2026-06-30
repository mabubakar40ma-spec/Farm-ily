@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Pricing</h1>
    </div>

    <main>

        <!--pricing-->
        <div class="container-fluid py-4">
            <div class="container py-5">
                <div class="form-heading text-center mb-5">
                    <div class="mb-2 text-success fs-2"><img src="{{ asset('frontend/images/icons/heading-icon.svg') }}"
                            alt="heading-icon"> </div>
                    <h2 class="fw-bold">Our Pricing</h2>
                    <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te.</p>
                </div>
                <div class="row text-center g-4">
                    <!-- Basic Plan -->
                    @foreach ($packages as $package)
                        <div class="col-md-4">
                            <div class="pricing-card bg-light mt-5">
                                <h3>{{ $package->name }}</h3>
                                <p class="price">${{ $package->price }}
                                    @if ($package->number_of_days === -1)
                                        <small>/ Lifetime</small>
                                    @else
                                        <small>/ {{ $package->number_of_days }} Days</small>
                                    @endif
                                </p>
                                <hr>
                                <ul class="list-unstyled features">
                                    @if ($package->num_of_listing === -1)
                                        <li>Unlimited Listings Submition</li>
                                    @else
                                        <li>{{ $package->num_of_listing }} Listings Submition</li>
                                    @endif

                                    @if ($package->num_of_amenities === -1)
                                        <li>Unlimited Listing Aminities</li>
                                    @else
                                        <li>{{ $package->num_of_amenities }} Listing Aminities</li>
                                    @endif

                                    @if ($package->num_of_photos === -1)
                                        <li>Unlimited Listing Photos</li>
                                    @else
                                        <li>{{ $package->num_of_photos }} Listing Photos</li>
                                    @endif

                                    @if ($package->num_of_video === -1)
                                        <li>Unlimited Listing Videos</li>
                                    @else
                                        <li>{{ $package->num_of_video }} Listing Videos</li>
                                    @endif

                                    @if ($package->num_of_featured_listing === -1)
                                        <p>Unlimited Featured Listing</p>
                                    @else
                                        <li>{{ $package->num_of_featured_listing }} Featured Listing</li>
                                    @endif
                                </ul>
                                <a href="{{ route('checkout.index', $package->id) }}" class="order-btn mt-3">Order
                                    now →</a>
                                {{-- <button class="btn btn-dark btn-choose mt-3">Choose Plan →</button> --}}
                            </div>
                        </div>
                    @endforeach
                    <!-- Standard Plan -->
                    {{-- <div class="col-md-4">
                        <div class="pricing-card standard">
                            <h3>Standard</h3>
                            <p class="price">$149.99 <small>/M</small></p>
                            <hr class="bg-white">
                            <ul class="list-unstyled features">
                                <li>Personalized Link Available</li>
                                <li>Free Support Available</li>
                                <li>Personalized Link Available</li>
                                <li>Free Support Available</li>
                                <li>Hide Branding Available</li>
                                <li>Free Setup Available</li>
                                <li>1 vCards</li>
                            </ul>
                            <button class="btn btn-white btn-choose mt-3">Choose Plan →</button>
                        </div>
                    </div>

                    <!-- Ultimate Plan -->
                    <div class="col-md-4">
                        <div class="pricing-card bg-light mt-5">
                            <h3>Ultimate</h3>
                            <p class="price">$249.99 <small>/M</small></p>
                            <hr>
                            <ul class="list-unstyled features">
                                <li>Personalized Link Available</li>
                                <li>Free Support Available</li>
                                <li>Personalized Link Available</li>
                                <li>Free Support Available</li>
                                <li>Personalized Link Available</li>
                                <li>Free Support Available</li>
                                <li>Personalized Link Available</li>
                                <li>Free Support Available</li>
                            </ul>
                            <button class="btn btn-dark btn-choose mt-3">Choose Plan →</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>


    </main>
@endsection
