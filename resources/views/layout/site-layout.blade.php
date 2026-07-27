
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Resort')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,400;1,9..144,500&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('styles')

</head>
<body>

    
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

@if($errors->any())
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
                      
@stack('scripts')

</body>
</html>
