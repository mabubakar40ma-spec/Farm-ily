@if (Route::is('home'))
    <header class="hero-section-top">

        <div class="logo-nav-main">
            <div class="logo-sec">
                <a class="text-white text-decoration-none" href="{{ route('home') }}" role="button" id="logo-n"
                    aria-expanded="false">
                    <img src="{{ config('settings.logo') }}" alt="Farmfusion" class="me-2">

                    {{-- {{ asset('frontend/images/farm-ily-logo.svg') }} --}}
                </a>
            </div>

            <div class="top-and-nav">
                <!-- Top Bar Section -->
                <div class="top-bar py-2 bg-transparent">
                    <div class="container-fluid d-flex justify-content-end align-items-center">
                        @if (Auth::check())
                            <!-- User Profile Link -->
                            <a href="{{ route('user.dashboard') }}" class="text-white me-4 text-decoration-none"><img
                                    src="{{ asset('frontend/images/icons/user-icon.svg') }}" alt="user"
                                    class="me-1">Profile</a>
                        @else
                            <!-- Login Link -->
                            <a href="{{ route('login') }}" class="text-white me-4 text-decoration-none"><img
                                    src="{{ asset('frontend/images/icons/login-icon.svg') }}" alt="login"
                                    class="me-1">Login</a>

                            <!-- Register Link -->
                            <a href="{{ route('register') }}" class="text-white me-4 text-decoration-none"><img
                                    src="{{ asset('frontend/images/icons/user-icon.svg') }}" alt="user"
                                    class="me-1">Register</a>
                        @endif
                    </div>
                </div>

                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
                    <div class="container-fluid">
                        <!-- Logo Section -->
                        <a class="navbar-brand text-white fw-bold" href="#">
                            <!-- <img src="{{ asset('frontend/images/farm-ily-logo.svg.svg') }}" alt="Farm Logo" class="me-2"> -->
                        </a>

                        <!--mobile device view-->
                        <div class="mobile-view">
                            <!-- Search Dropdown -->
                            <div class="nav-item dropdown search-container ms-3 d-md-none">
                                <a class="nav-link" href="#" role="button" id="searchDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('frontend/images/icons/search-icon.svg') }}" alt="search">
                                </a>
                                <!-- Dropdown Menu with Search Box -->
                                <div class="dropdown-menu dropdown-menu-end dropdown-search p-3"
                                    aria-labelledby="searchDropdown">
                                    <input type="text" id="searchBox" class="form-control" placeholder="Search...">
                                </div>
                            </div>

                            <!-- Navbar Toggler (for mobile view) -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Navbar Links -->
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active text-warning fw-bold"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('listings') }}">Listing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('packages') }}">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('equipment') }}">Equipments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('blog.index') }}">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>

                                <!-- Right Side Section -->
                                <div class="d-flex align-items-center">
                                    <div class="reach-us text-white me-3 d-flex align-items-center">
                                        <img src="{{ asset('frontend/images/icons/call-icon.svg') }}" alt="call"
                                            class="me-2">
                                        <div>
                                            <small>Reach to us</small><br>
                                            <strong><a href="tel:{{ config('settings.site_phone') }}"
                                                    class="text-white text-decoration-none">{{ config('settings.site_phone') }}</a></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
@elseif (!Route::is('home'))
    <!-- Hero Section -->

    <header class="hero-section equipment-hero-sec product-list-details-main inner-header-heading">

        <div class="logo-nav-main">
            <div class="logo-sec">
                <a class="text-white text-decoration-none" href="{{ route('home') }}" role="button" id="logo-n"
                    aria-expanded="false">
                    <img src="{{ asset('frontend/images/farm-ily-logo.svg.svg') }}" alt="Farm Logo" class="me-2">
                </a>
            </div>

            <div class="top-and-nav">
                <!-- Top Bar Section -->
                <div class="top-bar py-2 bg-transparent">
                    <div class="container-fluid d-flex justify-content-end align-items-center">
                        <!-- Login Link -->
                        @if (Auth::check())
                            <a href="{{ route('user.dashboard') }}" class="text-white me-4 text-decoration-none"><img
                                    src="{{ asset('frontend/images/icons/user-icon.svg') }}" alt="login"
                                    class="me-1">Profile</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white me-4 text-decoration-none"><img
                                    src="{{ asset('frontend/images/icons/login-icon.svg') }}" alt="login"
                                    class="me-1">Login</a>


                            <!-- Divider -->
                            <span class="text-white me-4">|</span>

                            <!-- Register Link -->
                            <a href="{{ route('register') }}" class="text-white me-4 text-decoration-none"><img
                                    src="{{ asset('frontend/images/icons/user-icon.svg') }}" alt="user"
                                    class="me-1">Register</a>
                        @endif

                    </div>
                </div>

                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
                    <div class="container-fluid">
                        <!-- Logo Section -->
                        <a class="navbar-brand text-white fw-bold" href="#">
                            <!-- <img src="{{ asset('frontend/images/farm-ily-logo.svg.svg') }}" alt="Farm Logo" class="me-2"> -->
                        </a>

                        <!--mobile device view-->
                        <div class="mobile-view">
                            <!-- Navbar Toggler (for mobile view) -->
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Navbar Links -->
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active text-warning fw-bold"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('listings') }}">Listing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('packages') }}">Packages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('equipment') }}">Equipments</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('blog.index') }}">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>

                                <!-- Right Side Section -->
                                <div class="d-flex align-items-center">
                                    <div class="reach-us text-white me-3 d-flex align-items-center">
                                        <img src="{{ asset('frontend/images/icons/call-icon.svg') }}" alt="call"
                                            class="me-3">
                                        <div>
                                            <small>Reach to us</small><br>
                                            <strong>+2500 25 578 750</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

    </header>
@endif
