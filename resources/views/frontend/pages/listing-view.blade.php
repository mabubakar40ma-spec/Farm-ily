@extends('frontend.layouts.master')
@section('content')
    <div class="container text-center hero-content">
        <h1 class="hero-title">Blog</h1>
    </div>

    <main class="product-list-details-main">

        <!--product list-->
        <div class="container py-4">
            <div class="row">


                <!-- Product Details -->
                <div class="col-md-9">
                    <div class="product-list">
                        <div class="product-details-img-block row">
                            <div class="col-md-4 image-container">
                                <img src="{{ asset('frontend/images/product-details-img.png') }}" alt="Farmer"
                                    class="img-fluid w-100 h-100">
                            </div>
                            <div class="col-md-8">
                                <div class="product-details-box">
                                    <h4 class="fw-bold">{{ $listing->title }}</h4>
                                    <p class="text-muted mb-2">By : {{ $listing->user->name }}</p>
                                    <h6 class="  mb-2"> {{ ucfirst($listing->user->user_type) }}</h6>
                                    <div class="d-flex align-items-center mb-3 rating-block">

                                        @if ($listing->is_featured)
                                            <div class="rating-star">
                                                <i class="far fa-star"></i>
                                                <span class="rating-stars me-3">Featured</span>
                                            </div>
                                        @endif
                                        @if ($listing->is_verified)
                                            <div class="rating-star">
                                                <span class="verified-icon me-2"> <img
                                                        src="{{ asset('frontend/images/icons/varified-icon.svg') }}"
                                                        alt="varified"> </span>
                                                <span class="text-muted me-3">Verified</span>
                                            </div>
                                        @endif
                                        <div class="location-sec">
                                            <span class="location-icon me-1"><img
                                                    src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                    alt="location"></span>
                                            <span class="text-muted">{{ $listing->location->name }}</span>
                                        </div>
                                    </div>
                                    {{-- <button class="btn btn-open px-4 py-2 rounded-pill">OPEN</button> --}}
                                </div>
                            </div>
                        </div>




                        <div class="product-details-discription">
                            {!! $listing->description !!}
                        </div>
                        <div class="listing_det_Photo">
                            <div class="row">
                                @foreach ($listing->gallery as $image)
                                    <div class="col-xl-3 col-sm-6">
                                        <a class="venobox" data-gall="gallery01" href="{{ asset($image->image) }}">
                                            <img src="{{ asset($image->image) }}" alt="gallery1" class="img-fluid w-100">
                                            <div class="photo_overlay">
                                                <i class="fal fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="listing_det_feature">
                            <div class="row">
                                @foreach ($listing->amenities as $amenity)
                                    @if ($amenity->amenity)
                                        <div class="col-xl-4 col-sm-6">
                                            <div class="listing_det_feature_single">
                                                <i class="{{ $amenity->amenity->icon }}"></i>
                                                <span>{{ $amenity->amenity->name }}</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="listing_det_video">
                            <div class="row">
                                @foreach ($listing->videoGallery as $video)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="listing_det_video_img">
                                            <img src="{{ getYtThumbnail($video->video_url) }}" alt="img"
                                                class="img-fluid w-100">
                                            <a class="venobox" data-autoplay="true" data-vbtype="video"
                                                href="{{ $video->video_url }}">
                                                <i class=" fas fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if ($listing->google_map_embed_code)
                            <div class="listing_det_location">
                                {!! $listing->google_map_embed_code !!}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="sidebar right-sidebar">
                        <div class="contact-sidebar mb-4">
                            <ul class="contact-details">
                                <li><span> <img src="{{ asset('frontend/images/icons/black-phone-icon.svg') }}"
                                            alt="call">
                                    </span> +96 5421
                                    5487</li>
                                <li><span> <img src="{{ asset('frontend/images/icons/black-location-icon.svg') }}"
                                            alt="location"> </span> New York
                                </li>
                                <li><span> <img src="{{ asset('frontend/images/icons/globe.svg') }}" alt="site">
                                    </span>
                                    www.vege&co.com</li>
                                <li><span> <img src="{{ asset('frontend/images/icons/black-phone-icon.svg') }}"
                                            alt="call">
                                    </span>
                                    vege-co@gmail.com</li>
                                <li><span> <img src="{{ asset('frontend/images/icons/location-outline.svg') }}"
                                            alt="address">
                                    </span>
                                    Address</li>
                            </ul>
                        </div>
                        @if (count($smellerListings) > 0)
                            <div class="contact-sidebar mb-4">
                                <h3>Similar Listing</h3>
                                @foreach ($smellerListings as $smellerListing)
                                    <ul class="similar-listing">
                                        <li>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="sl-img"> <img src="{{ asset($smellerListing->image) }}"
                                                            alt="{{ $smellerListing->title }}"
                                                            class="img-fluid w-100 h-100">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">

                                                    <div class="sl-desp">
                                                        <h4 class="fw-bold">{{ truncate($smellerListing->title) }}</h4>
                                                        <p class="text-muted mb-2">By :
                                                            {{ truncate($smellerListing->user->name) }}</p>
                                                        @if ($smellerListing->is_verified)
                                                            <div class="rating-star">
                                                                <span class="verified-icon"> <img
                                                                        src="{{ asset('frontend/images/icons/varified-icon.svg') }}"
                                                                        alt="varified"> </span>
                                                                <span class="text-muted me-3">Verified</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                @endforeach

                                </ul>
                            </div>
                        @endif
                        @if (count($listing->schedules) > 0)
                            <div class="contact-sidebar mb-4">
                                <h3>Hours</h3>
                                @foreach ($listing->schedules as $schedule)
                                    <ul class="hours-list">
                                        <li><span> {{ $schedule->day }} </span> {{ $schedule->start_time }} -
                                            {{ $schedule->end_time }}</li>
                                        {{-- <li><span> Monday </span> 9:OOam – 10:00 pm</li>
                                <li><span> Monday </span> 9:OOam – 10:00 pm</li>
                                <li><span> Monday </span> 9:OOam – 10:00 pm</li>
                                <li><span> Monday </span> 9:OOam – 10:00 pm</li>
                                <li><span> Monday </span> 9:OOam – 10:00 pm</li>
                                <li><span> Monday </span> 9:OOam – 10:00 pm</li> --}}
                                    </ul>
                                @endforeach
                            </div>
                        @endif

                        <div class="contact-sidebar mb-4">
                            <h3>Hours</h3>

                            <ul class="hours-list">

                                <li><span> Message </span> <a
                                        href="{{ route('chat.withUser', ['listing' => $listing->id]) }}">Chat</a></li>

                            </ul>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        </div>

    </main>
@endsection

@push('scripts')
@endpush
