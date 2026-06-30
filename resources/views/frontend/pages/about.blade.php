@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">About Us</h1>
    </div>

    <main>

        <!--About Us-->
        <div class="container py-4">

            <section id="about-sec">
                <div class="row">
                    <div class="col-md-7">
                        <div class="about-us-sec">
                            <div class="section-heading">
                                <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="heading">
                                <h2 class="section-title">Our Story</h2>
                                <p>FarmFusion is revolutionizing the agricultural landscape by empowering small and
                                    mid-sized farmers through a cutting-edge digital marketplace. With our platform, farmers
                                    break free from the constraints of unnecessary middlemen, unpredictable pricing, and
                                    limited market access. These hurdles often undermine their profit margins and create
                                    anxiety around transactions. At FarmFusion, we are committed to changing this narrative.
                                    Our user-friendly platform simplifies every step—from showcasing farm produce to
                                    ensuring timely delivery—while guaranteeing fair pricing, secure payment transactions,
                                    and dependable logistics. Farmers can effortlessly create profiles, list their crops or
                                    equipment, and connect in real-time with vetted buyers based on location, product type,
                                    and pricing. Distributors and retailers benefit from direct access to high-quality
                                    supplies without the hassles of traditional sourcing methods. But FarmFusion is more
                                    than just a marketplace. We offer powerful tools such as escrow services, mobile
                                    dashboards, and analytics, all designed to promote innovative, transparent, and secure
                                    trading. Whether it's renting equipment, coordinating transport, or fulfilling large
                                    orders, we empower both farmers and buyers to engage confidently. We envision an
                                    agricultural sector that is equitable, efficient, and modern. By working hand-in-hand
                                    with local cooperatives, NGOs, financial institutions, and development partners, we
                                    expand market access and provide vital training to support the farmers who need it most.
                                    By merging people, products, and technology, FarmFusion is creating a thriving
                                    agricultural economy that boosts farm incomes and ensures quality food reaches markets
                                    quickly, safely, and transparently. Join us in shaping the future of farming—together,
                                    we can create a brighter tomorrow!</p>
                            </div>



                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="aboutus-img"> <img src="{{ asset('frontend/images/why-choose-Section.png') }}"
                                alt="why-choose-Section" class="img-fluid w-100"> </div>
                    </div>
                </div>
        </div>
        </section>

        <section class="stats-section text-white">
            <div class="container stats-content">
                <div class="row align-items-center">
                    <div class="col-md-4 stat-item">
                        <div class="stat-number">120</div>
                        <div class="stat-label">Our Team</div>
                    </div>
                    <div class="col-md-4 stat-item left-right-border">
                        <div class="stat-number">1,189</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                    <div class="col-md-4 stat-item">
                        <div class="stat-number">1,189</div>
                        <div class="stat-label">All Categories</div>
                    </div>
                </div>
            </div>
        </section>


        <section class="categories">
            <div class="container-fluid">
                <div class="text-center">
                    <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="icon" style="height: 40px;">
                </div>
                <h2 class="section-title  mb-4">Our Categories</h2>
                <div class="row justify-content-center g-4">
                    <div class="col-6 col-sm-4 col-md-2">
                        <div class="category-card">
                            <img src="{{ asset('frontend/images/icons/categry-icon-bg.svg') }}" alt="Category Icon">
                            <h5>Category</h5>
                            <p>Farmers and buyers create verified profiles.</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2">
                        <div class="category-card">
                            <img src="{{ asset('frontend/images/icons/categry-icon-bg.svg') }}" alt="Category Icon">
                            <h5>Category</h5>
                            <p>Farmers and buyers create verified profiles.</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2">
                        <div class="category-card active">
                            <img src="{{ asset('frontend/images/icons/categry-icon-bg.svg') }}" alt="Category Icon">
                            <h5>Category</h5>
                            <p>Farmers and buyers create verified profiles.</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2">
                        <div class="category-card">
                            <img src="{{ asset('frontend/images/icons/categry-icon-bg.svg') }}" alt="Category Icon">
                            <h5>Category</h5>
                            <p>Farmers and buyers create verified profiles.</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2">
                        <div class="category-card">
                            <img src="{{ asset('frontend/images/icons/categry-icon-bg.svg') }}" alt="Category Icon">
                            <h5>Category</h5>
                            <p>Farmers and buyers create verified profiles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
