<header class="top-header">
    <div class="container">
        <div class="row align-items-center">

            <!-- Social Icons -->

            <div class="col-lg-4 col-md-4 d-none d-md-block ">

                <div class="social-icons mb-3">

                    <a href="https://www.instagram.com/_badoni_ji/"><i class="fa-brands fa-instagram""></i></a>

                    <a
                        href="https://www.guvi.in/verify-certificate?id=1C1121187877nOiHt4&course=chatgptenglish&trk=public_profile_see-credential"><i
                            class="fa-solid fa-g""></i></a>

                    <a href="www.linkedin.com/in/aryan-aswal-0074612a2"><i class="fab fa-linkedin-in"></i></a>

                    <a href="https://www.youtube.com/@VivekBadoni-r9"><i class="fab fa-youtube"></i></a>

                </div>

            </div>

            <!-- Logo -->

            <div class="col-lg-4 col-md-4 col-8 text-center text-md-start">

                <a href="{{ route('home') }}" class="logo">
                    <img src="image/logo3.jpg" alt="2">
                    {{-- ECO<span>RIK</span> --}}
                </a>

            </div>

            <!-- Address -->

            <div class="col-lg-4 col-md-4 col-4">

                <div class="header-address d-none d-lg-flex mb-1">

                    <i class="bx bx-location-plus"></i>

                    <span>Park Estate, Hathi Paon George Everest House, Mussoorie 248179 India</span>

                </div>

            </div>

        </div>

    </div>
</header>
<!--======================== 2 NAVBAR===========================-->

<nav class="navbar navbar-expand-lg custom-navbar" >

    <div class="container">

        <!-- Mobile Logo -->
        <a class="navbar-brand d-lg-none" href="{{ route('home') }}">
            <img src="image/logo3.jpg" alt="2">
        </a>
        <!-- Toggle -->

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menu -->

        <div class="collapse navbar-collapse gap-2 text-bold " id="mainNavbar">

            <ul class="navbar-nav me-auto">
                <!-- Direct Link - Single Item -->
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>

                <!-- Direct Link - Single Item -->
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link">About Us</a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/gallery') }}" class="nav-link">Room Gallery</a>
                </li>


                <li class="nav-item">
                    <a href="{{ url('/services') }}" class="nav-link">Our Services</a>
                </li>



                <li class="nav-item ">
                    <a  href="{{ url('/booking') }}" class="nav-link">Booking</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('query.form') }}" class="nav-link">Enquiry</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/contact') }}" class="nav-link">Contact Us</a>
                </li>

            </ul>

            <button type="button" class="btn-signin" data-bs-toggle="modal" data-bs-target="#signInModal">
                <i class="bi bi-person"></i> Sign In
            </button>

            <!-- Phone -->

            <div class="header-call">

                <a href="tel:9368545116" class="call-icon">
                    <i class="fa fa-phone-volume"></i>
                </a>

                <div class="call-text">
                    <h6> +91 9368545116</h6>
                </div>

            </div>

        </div>

    </div>

</nav>

{{-- </header> --}}
