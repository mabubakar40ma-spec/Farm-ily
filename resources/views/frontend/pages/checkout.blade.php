@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title text-capitalize">checkout</h1>
    </div>

    <main>


        <div class="your-selected-package w-100 h-auto d-block position-relative py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-sm-12">
                        <div class="mb-2 text-success fs-2"><img src="{{ asset('frontend/images/icons/heading-icon.svg') }}"
                                alt="heading-icon"></div>
                        <h2 class="fw-bold text-capitalize">your selected package</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>

                        <div class="card-body bg-light rounded py-4">
                            <h3 class="fw-bold text-capitalize">selected plan: <span>{{ $package->name }}</span></h3>
                            <hr />
                            <ul class="list-unstyled features d-flex flex-start flex-column w-100 ms-0">
                                @if ($package->num_of_listing === -1)
                                    <li>Unlimited Listings Submission</li>
                                @else
                                    <li>{{ $package->num_of_listing }} Listings Submission</li>
                                @endif

                                @if ($package->num_of_amenities === -1)
                                    <li>Unlimited Listing Amenities</li>
                                @else
                                    <li>{{ $package->num_of_amenities }} Listing Amenities</li>
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
                            <p class="price">${{ $package->price }}
                                @if ($package->number_of_days === -1)
                                    <small>/ Lifetime</small>
                                @else
                                    <small>/ {{ $package->number_of_days }} Days</small>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <h5 class="text-capitalize fw-bold">order summary</h5>
                        <hr />
                        <div class="ordered-pic-with-details w-100 h-auto d-flex gap-3">
                            <figure class="mb-0"><img src="{{ asset('frontend/images/icons/package-2.svg') }}"
                                    alt=""></figure>
                            <div class="ordered-summary">
                                <h6>{{ $package->name }}</h6>
                                <small>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet.</small>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered mt-5 mb-3">
                            <tbody>
                                {{-- <tr>
                                    <td class="text-capitalize fw-bold">subtotal</td>
                                    <td>&dollar;49.99</td>
                                </tr>

                                <tr>
                                    <td class="text-capitalize fw-bold">shipping</td>
                                    <td>&dollar;10.00</td>
                                </tr>

                                <tr>
                                    <td class="text-capitalize fw-bold">tax</td>
                                    <td>&dollar;1.99</td>
                                </tr> --}}

                                <tr class="bg-success">
                                    <td class="text-capitalize fw-bold text-white">total</td>
                                    <td class="fw-bold text-white">{{ currencyPosition($package->price) }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('stripe.payment') }}"
                            class="bg-dark text-white rounded w-100 text-capitalize border-0 py-2 order-checkout-btn">Order
                            now</a>
                        {{-- <button class="bg-dark text-white rounded w-100 text-capitalize border-0 py-2">place order</button> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- selected package -->

    </main>
@endsection
