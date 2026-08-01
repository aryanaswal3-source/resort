<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel')</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @stack('styles')

</head>

<body>

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
    </script>

    @stack('scripts')

</body>

</html>
