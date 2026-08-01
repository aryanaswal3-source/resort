<header class="admin-header">

    <nav class="navbar navbar-expand-lg admin-navbar">

        <div class="container-fluid">

            <!-- Mobile Menu -->
            <button class="btn menu-btn d-lg-none" id="menuBtn">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Empty Space -->
            <div class="flex-grow-1"> </div>

            <!-- Admin Profile -->
            <div class="dropdown">

                <button class="btn admin-profile dropdown-toggle"
                    data-bs-toggle="dropdown">

                    <div class="text-end d-none d-md-block">

                        <h5 class="mb-0 fw-bold">admin</h5>

                        <small class="text-muted">
                            admin Profile
                        </small>

                    </div>

                    <img src="{{ asset('image/adminlogo.png') }}" alt="admin">

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">

                    <li class="text-center py-2">

                        <img src="{{ asset('image/adminlogo.png') }}"
                            class="profile-big ">

                        <h5 class="mt-2 mb-0">Admin</h5>

                        <small>admin@gmail.com</small>

                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <a class="dropdown-item py-2" href="#">
                            <i class="fa-solid fa-user me-2"></i> Profile
                        </a>

                    </li>

                    <li>

                        <a class="dropdown-item py-2 text-danger" href="#">
                            <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                        </a>

                    </li>

                </ul>

            </div>

        </div>
    </nav>
</header>