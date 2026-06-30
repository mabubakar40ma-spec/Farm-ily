<section class="search-section">
    <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="Logo" class="mb-3">
    <h2 class="search-title">Explore The Marketplace</h2>

    <!-- Search Box -->
    <form action="{{ route('listings') }}" method="GET">
        <div class="search-box d-flex align-items-center justify-content-between">
            <input type="text" name="search" class="form-control form-control-custom me-2"
                placeholder="Search For Crops Or Buyers...">
            <div class="form-divider"></div>
            <select class="form-control form-control-custom me-2" name="category">
                <option value="">categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <div class="form-divider"></div>
            <select class="form-control form-control-custom me-2" name="location">
                <option value="">location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->slug }}">{{ $location->name }}</option>
                @endforeach
            </select>
            {{-- <input type="text" class="form-control form-control-custom me-2" placeholder="Location"> --}}
            <button class="btn search-btn">
                <i class="fas fa-search"></i> <span class="d-md-none">Search</span>
            </button>
        </div>
    </form>
</section>
