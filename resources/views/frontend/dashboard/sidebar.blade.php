<div class="sidebar p-4" id="sidebar">
    <div class="mb-4 d-flex align-items-center gap-2">
        <img src="{{ asset('frontend/images/farm-ily-logo.svg.svg') }}" alt="farm-ily" class="dashboard-logo">
    </div>
    <nav class="nav flex-column gap-2">
        <a href="{{ route('home') }}" class="nav-link "><i class="bi bi-arrow-left-circle me-2"></i> Back to site</a>
        <a href="{{ route('user.dashboard') }}" class="nav-link "><i class="bi bi-grid-fill me-2"></i>
            Dashboard</a>
        <a href="{{ route('user.profile.index') }}" class="nav-link"><i class="bi bi-person me-2"></i> Profile</a>
        <!-- Listing Dropdown Toggle -->
        @if (Auth::user()->user_type == 'farmer')
            <a class="nav-link " href="{{ route('user.listing.index') }}">
                <span><i class="bi bi-list-task me-2"></i> Listing</span>

            </a>


            <a href="{{ route('user.order.index') }}" class="nav-link"><i class="bi bi-cart me-2"></i> Orders</a>

            <a class="nav-link" href="{{ route('user.rent-equipment.index') }}"><i class="bi bi-truck-front me-2"></i>
                Rental
                Equipment </a>
            <a class="nav-link" href="{{ route('user.rental-equipment.booking') }}"><i class="bi-calendar-event"></i>
                Rental
                Equipment Bookings </a>
        @endif
        <a class="nav-link" href="{{ route('chat.conversations') }}"><i class="bi bi-chat-dots-fill me-2"></i>
            Messages </a>

        <a class="nav-link" href="{{ route('farming.chat') }}"><i class="bi bi-robot me-2"></i>
            AI Farming Chat </a>



        <a href="{{ route('packages') }}" class="nav-link"><i class="bi bi-journal-text me-2"></i> Package</a>
        <a href="#" class="nav-link"><i class="bi bi-person-lines-fill me-2"></i> Help</a>

        {{-- <a href="{{ route('logout') }}" class="nav-link"><i class="bi bi-box-arrow-right me-2"></i> Logout</a> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
            this.closest('form').submit();" class="nav-link"><i
                    class="bi bi-box-arrow-right me-2"></i> Logout</a>
        </form>
    </nav>
</div>
