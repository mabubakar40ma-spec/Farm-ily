<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ auth()->user()->avatar }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('admin.settings.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard.index') }}">
                {{-- {{ config('settings.site_name') }} --}}
                Farm-Ily
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard.index') }}">Farm-Ily
                {{-- {{ truncate(config('settings.site_name'), 2) }} --}}

            </a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Farm-Ily</li>
            <li class="{{ setSidebarActive(['admin.dashboard.index']) }}"><a class="nav-link"
                    href="{{ route('admin.dashboard.index') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>


            {{-- @canany(['listing index', 'pending listing', 'listing review', 'listing claims']) --}}
            <li
                class="dropdown {{ setSidebarActive([
                    'admin.category.*',
                    'admin.location.*',
                    'admin.amenity.*',
                    'admin.listing.*',
                    'admin.pending-listing.*',
                ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i>
                    <span>Listings</span></a>
                <ul class="dropdown-menu">
                    {{-- @can('listing index') --}}
                    <li class="{{ setSidebarActive(['admin.listing.*']) }}"><a class="nav-link"
                            href="{{ route('admin.listing.index') }}">All Listing</a></li>
                    <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Categories</a></li>
                    <li class="{{ setSidebarActive(['admin.location.*']) }}"><a class="nav-link"
                            href="{{ route('admin.location.index') }}">Location</a></li>
                    <li class="{{ setSidebarActive(['admin.amenity.*']) }}"><a class="nav-link"
                            href="{{ route('admin.amenity.index') }}">Amenities</a></li>
                    {{-- @endcan --}}
                    {{-- @can('pending listing') --}}
                    <li class="{{ setSidebarActive(['admin.pending-listing.*']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-listing.index') }}">Pending Listings</a></li>
                    {{-- @endcan --}}

                </ul>
            </li>
            {{-- @endcanany --}}

            {{-- @can('package index') --}}
            <li class="dropdown {{ setSidebarActive(['admin.packages.*', 'admin.payment-settings.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-dollar-sign"></i> <span>Manage Packages</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.packages.index']) }}"><a class="nav-link"
                            href="{{ route('admin.packages.index') }}">Packages</a></li>
                    {{-- @can('payment settings index') --}}
                    <li class="{{ setSidebarActive(['admin.payment-settings.index']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-settings.index') }}">Payment Settings</a></li>
                    {{-- @endcan --}}
                </ul>
            </li>

            <li class="dropdown {{ setSidebarActive(['admin.contact-form.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file-alt"></i>
                    <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.contact-form.*']) }}"><a class="nav-link"
                            href="{{ route('admin.contact-form.index') }}">Contact Form</a></li>
                </ul>
            </li>
            {{-- @endcan --}}

            {{-- @can('order index')
            <li class="{{ setSidebarActive(['admin.orders.index']) }}"><a class="nav-link" href="{{ route('admin.orders.index') }}"><i class="fas fa-cart-arrow-down"></i> <span>Order</span></a></li>
            @endcan
            @can('message index')
            <li class="{{ setSidebarActive(['admin.messages.index']) }}"><a class="nav-link" href="{{ route('admin.messages.index') }}"><i class="fas fa-comment-alt"></i> <span>Messages</span></a></li>
            @endcan

            @can('testimonial index')
            <li class="{{ setSidebarActive(['admin.testimonials.index']) }}" ><a class="nav-link" href="{{ route('admin.testimonials.index') }}"><i class="fas fa-star"></i> <span>Testimonials</span></a></li>
            @endcan --}}

            {{-- @can('blog index') --}}
            <li class="dropdown {{ setSidebarActive(['admin.blog-category.*', 'admin.blog.*']) }}">

                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i>
                    <span>Manage Blog</span></a>

                <ul class="dropdown-menu" {{ setSidebarActive(['admin.packages.*']) }}>
                    <li class="{{ setSidebarActive(['admin.blog-category.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Blog Categories</a></li>
                    <li class="{{ setSidebarActive(['admin.blog.index']) }}"><a class="nav-link"
                            href="{{ route('admin.blog.index') }}">Blog</a></li>


                </ul>
            </li>
            <li class="dropdown {{ setSidebarActive(['admin.rent-equipment.*', 'admin.pending-rent-equipment.*']) }}">

                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-tractor"></i>
                    <span> Rental Equipment</span></a>

                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.rent-equipment.index']) }}"><a class="nav-link"
                            href="{{ route('admin.rent-equipment.index') }}">All Rental Equipment</a></li>
                    <li class="{{ setSidebarActive(['admin.pending-rent-equipment.index']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-rent-equipment.index') }}">Pending Rental Equipment</a></li>


                </ul>
            </li>
            {{-- @endcan --}}
            <li class="{{ setSidebarActive(['admin.users.index']) }}"><a class="nav-link"
                    href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> <span>All User</span></a>
            </li>
            <li class="{{ setSidebarActive(['admin.orders.index']) }}"><a class="nav-link"
                    href="{{ route('admin.orders.index') }}"><i class="fas fa-cart-arrow-down"></i>
                    <span>Order</span></a></li>
            {{-- <li class="{{ setSidebarActive(['admin.rent-equipment.index']) }}"><a class="nav-link"
                    href="{{ route('admin.rent-equipment.index') }}"><i class="fas fa-tractor	"></i>
                    <span>Rental Equipment</span></a></li> --}}

            {{-- 
            @can('settings index') --}}
            <li class="{{ setSidebarActive(['admin.settings.index']) }}"><a class="nav-link"
                    href="{{ route('admin.settings.index') }}"><i class="fas fa-cogs"></i> <span>Settings</span></a>
            </li>
            {{-- @endcan --}}

            {{-- @can('settings index') --}}
            {{-- <li class="{{ setSidebarActive(['admin.clear-database.index']) }}"><a class="nav-link"
                    href="{{ route('admin.clear-database.index') }}"><i class="fas fa-skull-crossbones"></i>
                    <span>Wipe Database</span></a></li> --}}
            {{-- @endcan --}}
        </ul>
    </aside>
</div>
