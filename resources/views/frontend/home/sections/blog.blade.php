<section class="latest-news">
    <div class="container">
        <div class="text-center mb-5">
            <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="Logo" class="section-logo mb-2">
            <h2 class="fw-bold">Latest News & Tips</h2>
            <p class="text-muted">Success Stories from Our Community</p>
        </div>

        <div class="row">
            <!-- Blog 1 -->
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <div class="position-relative">
                            <img src="{{ asset($blog->image) }}" alt="Farmer Tips" class="card-img-top">
                            @if ($blog->category)
                                <div class="date-badge">{{ $blog->category->name }}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="blog-meta mb-2">
                                <span><i class="fas fa-user me-1"></i> {{ $blog->author->name }}</span>
                                <span class="ms-3"><i class="fas fa-calendar-alt"></i>
                                    {{ date('d M Y', strtotime($blog->created_at)) }}</span>
                            </div>
                            <h5 class="card-title">{{ truncate($blog->title) }}</h5>
                            <a href="" class="read-more-link">Read More <img
                                    src="{{ asset('frontend/images/icons/green-aerow.svg') }}" alt="more"></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
