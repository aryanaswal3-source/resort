<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Resort')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ResortStyle.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,400;1,9..144,500&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    @stack('styles')

</head>

<body>
    {{-- ===== Global Fixed Buy Now Button ===== --}}
   <a href="https://www.durexindia.com/?srsltid=AfmBOoppOtUhP1dB4nYjFgrfsHfj-ShW5wKsN5T-PEe-gvnFLBkUnqAx"
   class="btn-buy-now"
   target="_blank">

    <span class="icon-circle">
        <i class="bi bi-droplet-fill"></i>
    </span>

    <span>Buy Now</span>

</a>

    {{-- ===== Floating WhatsApp + Call buttons ===== --}}
<div class="floating-contact">
    <a href="https://wa.me/919368545116" target="_blank" class="floating-btn whatsapp-btn">
        <i class="bi bi-whatsapp"></i>
        <span class="floating-tooltip">Chat on WhatsApp</span>
    </a>
    {{-- <a href="tel:+919876543210" class="floating-btn call-btn">
        <i class="bi bi-telephone-fill"></i>
        <span class="floating-tooltip">Call Us Now</span>
    </a> --}}
</div>


    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: @json(session('success')),
                showConfirmButton: true
            });

            window.history.replaceState({}, document.title);
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: @json(session('error')),
                showConfirmButton: true
            });

            window.history.replaceState({}, document.title);
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                showConfirmButton: true
            });

            window.history.replaceState({}, document.title);
        </script>
    @endif



    @include('partials.header')

    {{-- Page Content --}}
    @yield('content')

    @include('partials.footer')

    @include('partials.signin-modal')

    @include('partials.signup-modal')


    @stack('scripts')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/ResortScript.js') }}"></script>


    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const signInModalEl = document.getElementById('signInModal');
            const signUpModalEl = document.getElementById('signUpModal');
            const signInModal = new bootstrap.Modal(signInModalEl);
            const signUpModal = new bootstrap.Modal(signUpModalEl);

            document.getElementById('goToSignUp')?.addEventListener('click', function(e) {
                e.preventDefault();
                signInModal.hide();
                setTimeout(() => signUpModal.show(), 300);
            });

            document.getElementById('backToSignIn')?.addEventListener('click', function(e) {
                e.preventDefault();
                signUpModal.hide();
                setTimeout(() => signInModal.show(), 300);
            });

            @if (session('form') === 'register' && $errors->any())
                signUpModal.show();
            @endif
        });
    </script>
</body>

</html>
