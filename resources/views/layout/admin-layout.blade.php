<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fontawesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ResortStyle.css') }}">

    @stack('styles')

</head>

<body>
    {{-- ================= ADMIN SPLASH SCREEN ================= --}}
    <div id="siteSplash">

        <div class="splash-content">

            <div class="splash-ring"></div>

            <img src="{{ asset('image/favicon.png') }}" alt="Sunset Vista Resort" class="splash-logo">

        </div>

    </div>
    {{-- ================= END ADMIN SPLASH SCREEN ================= --}}

    <div class="admin-wrapper">

        {{-- Sidebar --}}
        @include('partials.admin-sidebar')

        {{-- Main --}}
        <div class="main-wrapper">

            {{-- Header --}}
            @include('partials.admin-header')

            {{-- Content --}}
            <main class="main-content">

                @yield('content')

            </main>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <script src="{{ asset('js/admin.js') }}"></script> --}}
    <script>
        const menuBtn = document.getElementById("menuBtn");
        const sidebar = document.getElementById("adminSidebar");

        menuBtn.addEventListener("click", function() {
            sidebar.classList.toggle("show");
        });

        document.addEventListener("click", function(e) {

            if (
                !sidebar.contains(e.target) &&
                !menuBtn.contains(e.target)
            ) {
                sidebar.classList.remove("show");
            }

        });
        /* =========================================================
       SUNSET VISTA SPLASH SCREEN
    ========================================================= */

        document.addEventListener("DOMContentLoaded", function() {

            const splash = document.getElementById("siteSplash");

            if (!splash) return;

            setTimeout(function() {

                splash.classList.add("hide-splash");

            }, 700);

        });
    </script>

    @stack('scripts')

</body>

</html>
