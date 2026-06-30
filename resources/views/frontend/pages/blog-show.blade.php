@extends('frontend.layouts.master')
@section('content')
    <!-- Hero Content -->
    <div class="container text-center hero-content">
        <h1 class="hero-title">Blog List Details</h1>
    </div>

    <main>

        <!--Blog-->
        <div class="container-fluid py-4">
            <div class="row">


                <!-- blog -->
                <div class="col-xl-9 col-md-12">
                    <div class="product-list blog-details">
                        <div class="blog-post-img">
                            <img src="{{ asset($blog->image) }}" alt="blog-details" class="w-100">
                            <ul class="blog-detail-icon">
                                <li><img src="{{ asset('frontend/images/icons/calender-icon.svg') }}" alt="cal">
                                    {{ date('d M Y', strtotime($blog->created_at)) }}</li>
                                {{-- <li><img src="{{ asset('frontend/images/icons/comment-icon 1.svg') }}" alt="com"> 0
                                    Comment</li>
                                <li><img src="{{ asset('frontend/images/icons/eye-view-icon 1.svg') }}" alt="views"> 24
                                    Views</li> --}}
                            </ul>
                        </div>

                        <div class="blog-details-descriptioon">
                            <h2>{{ $blog->title }}</h2>
                            {!! $blog->description !!}
                        </div>



                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-3 col-md-12">
                    <div class="sidebar right-sidebar">
                        <div class="contact-sidebar mb-4">
                            <h3>Popular Post</h3>
                            <hr>
                            <ul class="similar-listing">
                                @foreach ($popularBlogs as $popularBlog)
                                    <li>
                                        <div class="row">
                                            <div class="col-xl-4 col-md-12">
                                                <div class="sl-img"> <img src="{{ asset($popularBlog->image) }}"
                                                        alt="farmer" class="img-fluid w-100 h-100"> </div>
                                            </div>
                                            <div class="col-xl-8 col-md-12">
                                                <div class="sl-desp blog-desp">
                                                    <span
                                                        class="text-muted mb-2">{{ date('d M Y', strtotime($popularBlog->created_at)) }}</span>
                                                    <p><a
                                                            href="{{ route('blog.show', $popularBlog->slug) }}">{{ truncate($popularBlog->title, 120) }}</a>
                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>


                        <div class="sidebar-block categry-block-main mb-4">
                            <h3>Categories</h3>
                            <hr>
                            <ul class="category-list sidebar-block">
                                @foreach ($categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach

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
