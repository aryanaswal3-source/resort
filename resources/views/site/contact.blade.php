@extends('layout.site-layout')

@section('title', 'Contact-Sunset-Vista-Resort')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

        .page-banner {
            background: url("{{ asset('image/about-banner.jpg') }}") center/cover no-repeat;
            min-height: 480px;
        }
    </style>
@endpush

@section('content')
    {{-- ============ contact banner ========== --}}
    <section class="page-banner position-relative d-flex align-items-center">

        <div class="page-banner-overlay position-absolute top-0 start-0 w-100 h-100"></div>

        <div class="container position-relative text-center">
            <h1 class="display-3 fw-bold text-white lh-lg" style="font-family: 'Playfair Display', serif; ">
                Contact
            </h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white fw-bold text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active fw-bold" aria-current="page">
                        Contact
                    </li>

                    <li class="breadcrumb-item active fw-bold" aria-current="page">
                        Contact Style One
                    </li>

                </ol>
            </nav>

        </div>

    </section>
    {{-- ============Row and 4colm============== --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4 align-items-stretch">

                <!-- Card 1: Email Us -->
                <div class="col-6 col-lg-3">
                    <div class="info-card border rounded p-4 p-lg-5 text-center h-100">
                        <div class="info-icon-circle mx-auto mb-3">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <h5 class="fw-bold mb-3 fs-4">Email Us:</h5>
                        <p class="mb-1"><a href="mailto:consumeraffairs@sunsetvista.com"
                                class="text-secondary text-decoration-none">consumeraffairs@sunsetvista.com</a></p>
                        <p class="mb-0"><a href="mailto:info@sunsetvista.com"
                                class="text-secondary text-decoration-none">info@sunsetvista.com</a></p>
                    </div>
                </div>

                <!-- Card 2: Call Us -->
                <div class="col-6 col-lg-3">
                    <div class="info-card border rounded p-4 p-lg-5 text-center h-100">
                        <div class="info-icon-circle mx-auto mb-3">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h5 class="fw-bold mb-3 fs-4">Call Us:</h5>
                        <p class="mb-1">Tel. + (91) 9897867590</p>
                        <p class="mb-0">Tel. +(91)9293949590</p>
                    </div>
                </div>

                <!-- Card 3: Location -->
                <div class="col-6 col-lg-3">
                    <div class="info-card border rounded p-4 p-lg-5 text-center h-100">
                        <div class="info-icon-circle mx-auto mb-3">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <h5 class="fw-bold mb-3 fs-4">Location</h5>
                        <p class="mb-0">2 Park Estate, Hathi Paon George Everest House, Mussoorie 248179 India</p>

                    </div>
                </div>

                <!-- Card 4: Call Us -->
                <div class="col-6 col-lg-3">
                    <div class="info-card border rounded p-4 p-lg-5 text-center h-100">
                        <div class="info-icon-circle mx-auto mb-3">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <h5 class="fw-bold mb-3 fs-4">Call Us:</h5>
                        <p class="mb-1">Tel. + (91) 9897867590</p>
                        <p class="mb-0">Tel. + (91)9293949590</p>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="border rounded p-4 p-md-5">

                <h2 class="text-center fw-bolder mb-5 contact-form-title">
                    Drop us a message for any query
                </h2>

                <form action="{{ route('contact.store') }}"method="POST">
                    @csrf
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: '{{ session('success') }}',
                                confirmButtonColor: '#f59e0b'
                            });
                        </script>
                    @endif
                    <div class="row g-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control form-control-lg rounded-3"
                                placeholder="Your Name" required>
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control form-control-lg rounded-3"
                                placeholder="Your Email" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control form-control-lg rounded-3"
                                placeholder="Your Phone" required>
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="subject" class="form-control form-control-lg rounded-3"
                                placeholder="Your Subject" required>
                        </div>

                        <div class="col-12">
                            <textarea name="message" rows="6" class="form-control form-control-lg rounded-3" placeholder="Your Message"
                                required></textarea>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <button type="submit"
                                class="btn btn-warning btn-md rounded-pill px-4 py-3 fw-semibold text-white">
                                Send Message
                                <span
                                    class="send-btn-icon d-inline-flex align-items-center justify-content-center rounded-circle ms-3 bg-white">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
