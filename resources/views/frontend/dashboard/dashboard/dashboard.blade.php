@extends('frontend.dashboard.index')
@section('content')
    <div class="row g-4 flex-wrap">
        <!-- Total Sales -->
        @if (Auth::user()->user_type == 'farmer')
            <div class="col-xxl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                <ul class="dashboard-listing-graph ps-0 d-flex flex-wrap justify-content-between row-gap-4">
                    <li>
                        <div class="card">
                            <div class="card-icon light-blue">
                                <img src="{{ asset('frontend/images/icons/listing-icon.svg') }}" alt="sales-graph">
                            </div>
                            <div class="card-details">
                                <small class="text-muted">Active Listing</small>
                                <h4 class="mt-2">{{ $activeListingCount }}</h4>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="card">
                            <div class="card-icon">
                                <img src="{{ asset('frontend/images/icons/listing-icon.svg') }}" alt="sales-graph">
                            </div>
                            <div class="card-details">
                                <small class="text-muted">Pending Listing</small>
                                <h4 class="mt-2">{{ $pendingListingCount }}</h4>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="card">
                            <div class="card-icon">
                                <img src="{{ asset('frontend/images/icons/listing-icon.svg') }}" alt="storage">
                            </div>
                            <div class="card-details">
                                <small class="text-muted">Total Listings</small>
                                <h4 class="mt-2">{{ $listingCount }}</h4>
                            </div>
                        </div>
                    </li>

                    {{-- <li>
                    <div class="card">
                        <div class="card-icon">
                            <img src="{{ asset('frontend/images/icons/reven.svg') }}" alt="reven-graph">
                        </div>
                        <div class="card-details">
                            <small class="text-muted">Revenue</small>
                            <h4 class="mt-2">$2,225</h4>
                        </div>
                    </div>
                </li> --}}
                </ul>
            </div>
        @endif

        <div class="col-xxl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12">

            {{-- <div class="active-package-section">
                <ul>
                    <li>
                        <div class="row">
                            <div class="col-md-6">Details</div>
                            <div class="col-md-6">Summary</div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">Details</div>
                            <div class="col-md-6">Summary</div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">Details</div>
                            <div class="col-md-6">Summary</div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-md-6">Details</div>
                            <div class="col-md-6">Summary</div>
                        </div>
                    </li>
                </ul>

            </div> --}}
            @if (Auth::user()->user_type == 'farmer')
                <div class="active_package">
                    <h4>Active Package</h4>
                    <div class="table-responsive">
                        <table class="table dashboard_table">
                            @if ($subscription?->package)
                                <tbody>
                                    <tr>
                                        <td class="active_left">Package name</td>
                                        <td class="package_right">{{ $subscription?->package?->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Price</td>
                                        <td class="package_right">{{ currencyPosition($subscription->package->price) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Purchase Date</td>
                                        <td class="package_right">
                                            {{ date('d F Y', strtotime($subscription->purchase_date)) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Expired Date</td>
                                        <td class="package_right">{{ date('d F Y', strtotime($subscription->expire_date)) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Maximum Listing </td>
                                        <td class="package_right">
                                            @if ($subscription->package->num_of_listing === -1)
                                                Unlimited
                                            @else
                                                {{ $subscription->package->num_of_listing }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Maximum Aminities</td>
                                        <td class="package_right">
                                            @if ($subscription->package->num_of_amenities === -1)
                                                Unlimited
                                            @else
                                                {{ $subscription->package->num_of_amenities }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Maximum Photo</td>
                                        <td class="package_right">

                                            @if ($subscription->package->num_of_photos === -1)
                                                Unlimited
                                            @else
                                                {{ $subscription->package->num_of_photos }}
                                            @endif

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="active_left">Maximum Video</td>
                                        <td class="package_right">

                                            @if ($subscription->package->num_of_video === -1)
                                                Unlimited
                                            @else
                                                {{ $subscription->package->num_of_video }}
                                            @endif
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="active_left">Featured Listing Available</td>
                                        <td class="package_right">
                                            @if ($subscription->package->num_of_video === -1)
                                                Unlimited
                                            @else
                                                {{ $subscription->package->num_of_featured_listing }}
                                            @endif
                                        </td>

                                    </tr>
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td class="w-100">No Package Found!</td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            @endif

            {{-- <div class="my-4 cloud">
                <div class="card shadow-sm rounded-4 border-0 p-4">
                    <h5 class="fw-bold mb-3">Weather Forecast</h5>

                    <!-- Location + Main Weather Info -->
                    <div class="d-flex justify-content-between flex-wrap mb-2">
                        <div>
                            <div class="text-muted">Riverside County, CA</div>
                            <div class="d-flex align-items-center mt-2">
                                <div class="me-2 text-warning fs-4">☀️</div>
                                <div class="fs-4 fw-bold text-dark">78°F</div>
                            </div>
                            <div class="text-muted">Sunny, clear skies</div>
                        </div>
                        <div class="text-end mt-3 mt-md-0">
                            <div class="text-muted">Precipitation</div>
                            <div class="fw-bold text-dark">5%</div>
                            <div class="text-muted mt-2">Humidity</div>
                            <div class="fw-bold text-dark">45%</div>
                        </div>
                    </div>

                    <hr />

                    <!-- 5-Day Forecast -->
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <div class="text-muted">Thu</div>
                            <div class="fs-5">☀️</div>
                            <div class="fw-bold">78°</div>
                        </div>
                        <div>
                            <div class="text-muted">Fri</div>
                            <div class="fs-5">☀️</div>
                            <div class="fw-bold">80°</div>
                        </div>
                        <div>
                            <div class="text-muted">Sat</div>
                            <div class="fs-5">⛅</div>
                            <div class="fw-bold">76°</div>
                        </div>
                        <div>
                            <div class="text-muted">Sun</div>
                            <div class="fs-5">🌧️</div>
                            <div class="fw-bold">72°</div>
                        </div>
                        <div>
                            <div class="text-muted">Mon</div>
                            <div class="fs-5">☀️</div>
                            <div class="fw-bold">75°</div>
                        </div>
                    </div>
                </div>

            </div> --}}
            <div class="my-4 cloud">
                <div class="card shadow-sm rounded-4 border-0 p-4">
                    <h5 class="fw-bold mb-3">Weather Forecast</h5>

                    <!-- Location + Main Weather Info -->
                    <div class="d-flex justify-content-between flex-wrap mb-2">
                        <div>
                            <div class="text-muted" id="location-name">Loading...</div>
                            <div class="d-flex align-items-center mt-2">
                                <div class="me-2 text-warning fs-4" id="weather-icon">🌤️</div>
                                <div class="fs-4 fw-bold text-dark" id="temperature">--°F</div>
                            </div>
                            <div class="text-muted" id="weather-description">--</div>
                        </div>
                        <div class="text-end mt-3 mt-md-0">
                            <div class="text-muted">Precipitation</div>
                            <div class="fw-bold text-dark" id="precipitation">--%</div>
                            <div class="text-muted mt-2">Humidity</div>
                            <div class="fw-bold text-dark" id="humidity">--%</div>
                        </div>
                    </div>

                    <hr />

                    <!-- 5-Day Forecast -->
                    <div class="d-flex justify-content-between text-center" id="forecast">
                        <!-- Forecast will be injected here -->
                    </div>
                </div>
            </div>


            <div class="crops-img">
                <img src="{{ asset('frontend/images/crops.png') }}" alt="crops" class="w-100">
            </div>


        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const API_KEY = "b735f5e1b2774ecdbac8a5abf2763ec7"; // Replace with your actual OpenWeatherMap API key
        const CITY = "Riverside"; // You can make this dynamic or based on user location

        async function fetchWeather() {
            try {
                const weatherRes = await fetch(
                    `https://api.openweathermap.org/data/2.5/weather?q=${CITY}&appid=${API_KEY}&units=imperial`);
                const forecastRes = await fetch(
                    `https://api.openweathermap.org/data/2.5/forecast?q=${CITY}&appid=${API_KEY}&units=imperial`);

                const weather = await weatherRes.json();
                const forecast = await forecastRes.json();

                // Current Weather
                document.getElementById("location-name").textContent = weather.name + ", " + weather.sys.country;
                document.getElementById("temperature").textContent = Math.round(weather.main.temp) + "°F";
                document.getElementById("weather-description").textContent = weather.weather[0].description;
                document.getElementById("humidity").textContent = weather.main.humidity + "%";
                document.getElementById("precipitation").textContent = weather.rain ? (weather.rain["1h"] || 0) + "%" :
                    "0%";
                document.getElementById("weather-icon").textContent = getIcon(weather.weather[0].main);

                // 5-Day Forecast (take 12:00 PM entries only)
                const forecastDiv = document.getElementById("forecast");
                forecastDiv.innerHTML = "";

                const forecastDays = forecast.list.filter(item => item.dt_txt.includes("12:00:00"));
                forecastDays.slice(0, 5).forEach(item => {
                    const date = new Date(item.dt * 1000);
                    const day = date.toLocaleDateString('en-US', {
                        weekday: 'short'
                    });
                    const icon = getIcon(item.weather[0].main);
                    const temp = Math.round(item.main.temp) + "°";

                    forecastDiv.innerHTML += `
                    <div>
                        <div class="text-muted">${day}</div>
                        <div class="fs-5">${icon}</div>
                        <div class="fw-bold">${temp}</div>
                    </div>
                `;
                });
            } catch (err) {
                console.error("Weather fetch error:", err);
            }
        }

        function getIcon(main) {
            switch (main.toLowerCase()) {
                case "clear":
                    return "☀️";
                case "clouds":
                    return "⛅";
                case "rain":
                    return "🌧️";
                case "thunderstorm":
                    return "⛈️";
                case "snow":
                    return "❄️";
                case "drizzle":
                    return "🌦️";
                case "mist":
                case "fog":
                    return "🌫️";
                default:
                    return "🌡️";
            }
        }

        fetchWeather();
    </script>
@endpush
