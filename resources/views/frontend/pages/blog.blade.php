@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Blog</h1>
    </div>

    <main>

        <!--Blog-->
        <div class="container-fluid py-4">
            <div class="row">


                <!-- blog -->
                <div class="col-md-9">
                    <div class="product-list blog-list-main">

                        @foreach ($blogs as $blog)
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="blog-card d-flex flex-row">
                                        <div class="col-md-5 blog-card-img">
                                            <img src="{{ asset($blog->image) }}" alt="Farmer" class="img-fluid">
                                        </div>
                                        <div class="col-md-7 blog-content">
                                            <small class="text-muted mt-2">{{ $blog->category->name }}</small>
                                            <a href="{{ route('blog.show', $blog->slug) }}">
                                                <h5 class="mt-2">{{ truncate($blog->title) }}</h5>
                                            </a>
                                            <p>{{ truncate(strip_tags($blog->description), 200) }}</p>
                                            <p class="text-muted small mb-4">
                                                {{ date('d M Y', strtotime($blog->created_at)) }}</p>
                                            <a href="{{ route('blog.show', $blog->slug) }}" class="read-more">More <img
                                                    src="{{ asset('frontend/images/icons/green-aerow.svg') }}"
                                                    alt="aerow">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="blog-card d-flex flex-row">
                                    <div class="col-md-5 blog-card-img">
                                        <img src="{{ asset('frontend/images/farmer-02.png') }}" alt="Farmer"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-md-7 blog-content">
                                        <small class="text-muted mt-2">News</small>
                                        <h5 class="mt-2">Post Format Quote Blogs</h5>
                                        <p>Join as a farmer or buyer, list or search for produce, and let our smart
                                            algorithm match you. Negotiate prices securely...</p>
                                        <p class="text-muted small mb-4">April 13, 2025</p>
                                        <a href="#" class="read-more">More <img
                                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="aerow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="blog-card d-flex flex-row">
                                    <div class="col-md-5 blog-card-img">
                                        <img src="{{ asset('frontend/images/farmer-02.png') }}" alt="Farmer"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-md-7 blog-content">
                                        <small class="text-muted mt-2">News</small>
                                        <h5 class="mt-2">Post Format Quote Blogs</h5>
                                        <p>Join as a farmer or buyer, list or search for produce, and let our smart
                                            algorithm match you. Negotiate prices securely...</p>
                                        <p class="text-muted small mb-4">April 13, 2025</p>
                                        <a href="#" class="read-more">More <img
                                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="aerow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="blog-card d-flex flex-row">
                                    <div class="col-md-5 blog-card-img">
                                        <img src="{{ asset('frontend/images/farmer-02.png') }}" alt="Farmer"
                                            class="img-fluid">
                                    </div>
                                    <div class="col-md-7 blog-content">
                                        <small class="text-muted mt-2">News</small>
                                        <h5 class="mt-2">Post Format Quote Blogs</h5>
                                        <p>Join as a farmer or buyer, list or search for produce, and let our smart
                                            algorithm match you. Negotiate prices securely...</p>
                                        <p class="text-muted small mb-4">April 13, 2025</p>
                                        <a href="#" class="read-more">More <img
                                                src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="aerow">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="pagenation-row">
                            <div class="pagenation">
                                {{-- <ul>
                                    <li><span> <img src="{{ asset('frontend/images/icons/gray-left-arrow.svg') }}"
                                                alt="gray-left-arrow"> </span>
                                    </li>
                                    <li>1</li>
                                    <li>2</li>
                                    <li class="active">3</li>
                                    <li>4</li>
                                    <li>5</li>
                                    <li><span> <img src="{{ asset('frontend/images/icons/gray-right-arrow.svg') }}"
                                                alt="gray-right-arrow"> </span>
                                    </li>
                                </ul> --}}
                                @if ($blogs->hasPages())
                                    {{ $blogs->withQueryString()->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="sidebar right-sidebar">
                        {{-- <div class="contact-sidebar mb-4">
                            <h3>Popular Post</h3>
                            <hr>
                            <ul class="similar-listing">
                                <li>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="sl-img"> <img src="{{ asset('frontend/images/farmer-01.png') }}"
                                                    alt="farmer" class="img-fluid w-100 h-100"> </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="sl-desp blog-desp">
                                                <span class="text-muted mb-2">April 13, 2025</span>
                                                <p>Join as a farmer or buyer...</p>
                                                <p class="commnet"><span>0 Comments</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="sl-img"> <img src="{{ asset('frontend/images/farmer-01.png') }}"
                                                    alt="farmer" class="img-fluid w-100 h-100"> </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="sl-desp blog-desp">
                                                <span class="text-muted mb-2">April 13, 2025</span>
                                                <p>Join as a farmer or buyer...</p>
                                                <p class="commnet"><span>0 Comments</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="sl-img"> <img src="{{ asset('frontend/images/farmer-01.png') }}"
                                                    alt="farmer" class="img-fluid w-100 h-100"> </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="sl-desp blog-desp">
                                                <span class="text-muted mb-2">April 13, 2025</span>
                                                <p>Join as a farmer or buyer...</p>
                                                <p class="commnet"><span>0 Comments</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div> --}}


                        <div class="sidebar-block categry-block-main mb-4">
                            <h3>Categories</h3>
                            <hr>

                            <ul class="category-list sidebar-block">
                                @foreach ($categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                                {{-- <li>Patato</li>
                                <li>Farm</li>
                                <li>Tomato</li>
                                <li>Patato</li>
                                <li>Farm</li> --}}
                            </ul>

                        </div>

                        <div class="sidebar-ads-block">
                            <img src="{{ asset('frontend/images/farmer-ads-img.png') }}" alt="farmer"
                                class="w-100 img-fluid">
                            <a href="#" class="btn custom-btn-color btn-lg mt-3">Explore Our Produce</a>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </main>
@endsection
