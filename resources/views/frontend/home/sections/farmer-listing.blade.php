<section class="farmer-listing-section">
    <div class="container-fluid">
        <h2 class="text-center mb-5">Farmer Listing</h2>

        <!-- Owl Carousel Wrapper -->
        <div class="owl-carousel owl-theme farmer-carousel">
            @foreach ($listings as $listing)
                <!-- Card 1 -->
                <div class="item">
                    <div class="card">
                        <div class="card-img"><img src="{{ asset($listing->image) }}" class="card-img-top" alt="Potato">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ truncate($listing->title) }}</h5>
                            {{-- <ul>
                            <li>
                                <p class="card-text"><strong>Qty:</strong> 50 Tons</p>
                            </li>
                            <li>
                                <p class="card-text"><strong>Price:</strong> $2/kg</p>
                            </li>
                        </ul> --}}
                            <p class="map-text"><i class="fas fa-map-marker-alt"></i> {{ $listing->location->name }}</p>
                            <a href="{{ route('listing.show', $listing->slug) }}" class="text-more">More <img
                                    src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="black-aerow">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Card 2 -->
            {{-- <div class="item">
                <div class="card">
                    <div class="card-img"><img src="{{ asset('frontend/images/farmer-carousel-img/Figure-02.png') }}"
                            class="card-img-top" alt="Vegetables"></div>
                    <div class="card-body">
                        <h5 class="card-title">Vegetables</h5>
                        <ul>
                            <li>
                                <p class="card-text"><strong>Qty:</strong> 50 Tons</p>
                            </li>
                            <li>
                                <p class="card-text"><strong>Price:</strong> $2/kg</p>
                            </li>
                        </ul>
                        <p class="map-text"><i class="fas fa-map-marker-alt"></i> New York</p>
                        <a href="#" class="text-more">More <img
                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="black-aerow">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="item">
                <div class="card">
                    <div class="card-img"><img src="{{ asset('frontend/images/farmer-carousel-img/Figure-03.png') }}"
                            class="card-img-top" alt="Cucumber"></div>
                    <div class="card-body">
                        <h5 class="card-title">Cucumber</h5>
                        <ul>
                            <li>
                                <p class="card-text"><strong>Qty:</strong> 50 Tons</p>
                            </li>
                            <li>
                                <p class="card-text"><strong>Price:</strong> $2/kg</p>
                            </li>
                        </ul>
                        <p class="map-text"><i class="fas fa-map-marker-alt"></i> New York</p>
                        <a href="#" class="text-more">More <img
                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="black-aerow">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="item">
                <div class="card">
                    <div class="card-img"><img src="{{ asset('frontend/images/farmer-carousel-img/Figure-04.png') }}"
                            class="card-img-top" alt="Wheat"></div>
                    <div class="card-body">
                        <h5 class="card-title">Wheat</h5>
                        <ul>
                            <li>
                                <p class="card-text"><strong>Qty:</strong> 50 Tons</p>
                            </li>
                            <li>
                                <p class="card-text"><strong>Price:</strong> $2/kg</p>
                            </li>
                        </ul>
                        <p class="map-text"><i class="fas fa-map-marker-alt"></i> New York</p>
                        <a href="#" class="text-more">More <img
                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="black-aerow">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="item">
                <div class="card">
                    <div class="card-img"><img src="{{ asset('frontend/images/farmer-carousel-img/Figure-05.png') }}"
                            class="card-img-top" alt="Wheat"></div>
                    <div class="card-body">
                        <h5 class="card-title">Wheat</h5>
                        <ul>
                            <li>
                                <p class="card-text"><strong>Qty:</strong> 50 Tons</p>
                            </li>
                            <li>
                                <p class="card-text"><strong>Price:</strong> $2/kg</p>
                            </li>
                        </ul>
                        <p class="map-text"><i class="fas fa-map-marker-alt"></i> New York</p>
                        <a href="#" class="text-more">More <img
                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="black-aerow">
                        </a>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
