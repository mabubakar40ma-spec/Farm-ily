@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Farmer Listing</h1>
    </div>

    <main>

        <!--product list-->
        <div class="container-fluid py-4">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="sidebar">
                        <form action="{{ route('listings') }}" method="GET">
                            <ul class="sidebar-list">
                                <li class="">
                                    <div class="mb-3 d-flex search-input">
                                        <input type="text" class="form-control" name="search"
                                            value="{{ request()->search }}" placeholder="Search..." />
                                        {{-- <button class="btn btn-success ms-2" type="submit">
                                            <img src="{{ asset('frontend/images/icons/search-icon.svg') }}" alt="search">
                                        </button> --}}
                                    </div>
                                </li>

                                <li class="mb-3">
                                    <!--category dropdown-->
                                    <select>
                                        <option disabled selected>Categories</option>
                                        @foreach ($categories as $category)
                                            <option @selected($category->slug == request()->category) value="{{ $category->slug }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </li>

                                <li class="mb-3">
                                    <!--location dropdown-->
                                    <select>

                                        <option value="">Location</option>
                                        @foreach ($locations as $location)
                                            <option @selected($location->slug == request()->location) value="{{ $location->slug }}">
                                                {{ $location->name }}</option>
                                        @endforeach

                                    </select>

                                </li>

                                <li>
                                    <div class="mb-3 cat-list">
                                        @foreach ($amenities as $amenity)
                                            <div class="form-check">
                                                <input @checked(in_array($amenity->slug, request()->has('amenity') && is_array(request()->amenity) ? request()->amenity : [])) class="form-check-input" type="checkbox"
                                                    value="{{ $amenity->slug }}" name="amenity[]"
                                                    id="flexCheckIndeterminate-{{ $amenity->id }}">
                                                <label class="form-check-label"
                                                    for="flexCheckIndeterminate-{{ $amenity->id }}">
                                                    {{ $amenity->name }}
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                </li>

                            </ul>

                            <button type="submit" class="btn btn-search w-100">Search <img
                                    src="{{ asset('frontend/images/icons/arrow-white-icon.svg') }}" alt="arrow">
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Product List -->
                <div class="col-md-9 product-list">
                    <div class="row g-4">
                        @foreach ($listings as $listing)
                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="cate" bis_skin_checked="1">Category</div>
                                    {{-- <div class="cate" bis_skin_checked="1">{{ $listing->category->name }}</div> --}}
                                    <img src="{{ asset($listing->image) }}"
                                        alt="{{ $listing->title }} class="card-img-top">
                                    <div class="card-body">
                                        <a href="{{ route('listing.show', $listing->slug) }}">
                                            <h5 class="card-title">{{ truncate($listing->title) }}</h5>
                                        </a>
                                        {{-- <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul> --}}
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            {{ $listing->location->name }}
                                        </p>
                                        <a href="{{ route('listing.show', $listing->slug) }}" class="text-success">More
                                            <img src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Card -->
                        {{-- <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-02.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York
                                        </p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-03.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York
                                        </p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!--row 2-->
                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-01.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York</p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-02.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York</p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-03.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York</p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!--Row 3-->
                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-01.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York</p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-02.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York</p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Card -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <img src="{{ asset('frontend/images/farmer-03.png') }}" class="card-img-top"
                                        alt="Tomato">
                                    <div class="card-body">
                                        <h5 class="card-title">Tomato</h5>
                                        <ul>
                                            <li class="card-text mb-1"><strong>Qty:</strong> 50 Tons</li>
                                            <li class="card-text mb-1"><strong>Price:</strong> $2/kg</li>
                                        </ul>
                                        <p class="card-text text-muted"><img
                                                src="{{ asset('frontend/images/icons/location-icon.svg') }}"
                                                alt="location">
                                            New
                                            York</p>
                                        <a href="#" class="text-success">More <img
                                                src="{{ asset('frontend/images/icons/next-icon.svg') }}" alt="next-icon">
                                        </a>
                                    </div>
                                </div>
                            </div> --}}

                        <!-- Repeat card as needed -->
                        <!-- Copy-paste above block with changes for Potato, Vegetables etc -->

                    </div>

                    <div class="pagenation">
                        {{-- <ul>
                            <li><span> <img src="{{ asset('frontend/images/icons/gray-left-arrow.svg') }}"
                                        alt="gray-left-arrow"> </span></li>
                            <li>1</li>
                            <li>2</li>
                            <li class="active">3</li>
                            <li>4</li>
                            <li>5</li>
                            <li><span> <img src="{{ asset('frontend/images/icons/gray-right-arrow.svg') }}"
                                        alt="gray-right-arrow"> </span></li>
                        </ul> --}}
                        @if ($listings->hasPages())
                            {{ $listings->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@push('scripts')
@endpush
