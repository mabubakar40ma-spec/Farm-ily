@extends('frontend.dashboard.index')

@section('content')
    <div class="container-fluid">
        <div class="dashboard mb-5 gap-3">
            <div class="row g-4 flex-wrap">
                <!-- Total Sales -->
                <div class="col-xxl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
                    <ul class="dashboard-listing-graph ps-0 d-flex flex-wrap justify-content-between row-gap-4">
                        <li>
                            <div class="card">
                                <div class="card-icon light-blue">
                                    <img src="{{ asset('frontend/images/icons/sales-graph-icon.svg') }}" alt="sales-graph">
                                </div>
                                <div class="card-details">
                                    <small class="text-muted">Total Sales</small>
                                    <h4 class="mt-2">$50,565</h4>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card">
                                <div class="card-icon">
                                    <img src="{{ asset('frontend/images/icons/cart 1.svg') }}" alt="sales-graph">
                                </div>
                                <div class="card-details">
                                    <small class="text-muted">Total Orders</small>
                                    <h4 class="mt-2">565</h4>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card">
                                <div class="card-icon">
                                    <img src="{{ asset('frontend/images/icons/storage-icon.svg') }}" alt="storage">
                                </div>
                                <div class="card-details">
                                    <small class="text-muted">Current Inventory</small>
                                    <h4 class="mt-2">20,360</h4>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="card">
                                <div class="card-icon">
                                    <img src="{{ asset('frontend/images/icons/reven.svg') }}" alt="reven-graph">
                                </div>
                                <div class="card-details">
                                    <small class="text-muted">Revenue</small>
                                    <h4 class="mt-2">$2,225</h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>



                <div class="col-xxl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12">

                    <div class="active-package-section">
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

                    </div>



                    <div class="my-4 cloud">
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

                    </div>


                    <div class="crops-img">
                        <img src="{{ asset('frontend/images/crops.png') }}" alt="crops" class="w-100">
                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection
