<aside class="admin-sidebar" id="adminSidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
        <img src="{{ asset('image/logo3.jpg') }}" alt="Logo">
    </div>

    <!-- Scrollable Menu -->
    <div class="sidebar-menu-wrapper">

        <ul class="sidebar-menu">

            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>



            <li class="nav-item">
                <a href="{{ route('admin.services.index') }}"
                    class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-box"></i>
                    <span>Services</span>
                </a>
            </li>


            <li>
                <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">

                    <i class="fa-solid fa-users"></i>

                    <span>Users</span>

                </a>
            </li>

            <li>
                <a href="{{ route('admin.bookings.index') }}"
                    class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-calendar"></i>
                    <span>Bookings</span>
                    @php
                        $unreadCount = auth()->user()->unreadNotifications->count();
                    @endphp
                    @if ($unreadCount > 0)
                        <span class="badge bg-danger rounded-pill ms-auto">{{ $unreadCount }}</span>
                    @endif
                </a>
            </li>
            <li>
                <a href="{{ route('admin.queries.index') }}"
                    class="{{ request()->routeIs('admin.queries.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    <span>Customer Queries</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.gallery.index') }}"
                    class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-image"></i>
                    <span>Gallery</span>
                </a>
            </li>

            {{-- <li>
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span>Settings</span>
                </a> --}}
            </li>
        </ul>
    </div>

    <!-- Bottom Button -->
    <div class="sidebar-bottom">
        <a href="{{ route('admin.dashboard') }}" class="btn-arrow" role="button">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</aside>
