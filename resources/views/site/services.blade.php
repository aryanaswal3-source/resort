@extends('layout.site-layout')

@section('title', 'Services')

@push('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

        .page-banner {
            background: url("{{ asset('image/about-banner.jpg') }}") center/cover no-repeat;
            min-height: 480px;
        }

        .service-card-img {
            height: 260px;
            object-fit: cover;
        }

        .service-book-btn {
            position: absolute;
            left: 20px;
            bottom: 20px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.6);
            color: #000;
            border: none;
        }

        .service-book-btn:hover {
            background: rgb(255, 255, 255);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        .service-card {
            transition: transform .3s ease;
            background: #fff;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        /* ===== Split background: left plain, right image ===== */
        .services-intro {
            position: relative;
            overflow: hidden;
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .services-bg-split {
            position: absolute;
            inset: 0;
            z-index: 0;
            display: flex;
        }

        .services-bg-split .bg-left {
            width: 60%;
            background: #ffffff;
        }

        .services-bg-split .bg-right {
            width: 40%;
            background: url("{{ asset('image/service.jpg') }}") right center / cover no-repeat;
            opacity: 1;
        }

        .services-intro .container {
            position: relative;
            z-index: 1;
        }

        /* ===== Sliding cards row ===== */
        .services-slider {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            padding-bottom: 0.5rem;
            -webkit-overflow-scrolling: touch;

            /* hide scrollbar */
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE/Edge */
        }

        .services-slider::-webkit-scrollbar {
            display: none;
            /* Chrome/Safari/Edge */
        }

        .services-slide-item {
            flex: 0 0 360px;
            scroll-snap-align: start;
        }

        .services-slide-item .service-card-img {
            height: 300px;
        }

        .services-slider-nav {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: none;
            background: #111;
            color: #fff;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        @media (max-width: 767px) {
            .services-slider-nav {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }

            .services-slide-item {
                flex: 0 0 260px;
            }

            .services-slide-item .service-card-img {
                height: 200px;
            }
        }

        .services-slider-nav:hover {
            background: #333;
        }
    </style>
@endpush

@section('content')
    {{-- ============ Our Services banner ========== --}}
    <section class="page-banner position-relative d-flex align-items-center">

        <div class="page-banner-overlay position-absolute top-0 start-0 w-100 h-100"></div>

        <div class="container position-relative text-center">

            <h1 class="display-3 fw-bold text-white mb-3  lh-lg" style="font-family: 'Playfair Display', serif; ">
                Our Services
            </h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white fw-bold text-decoration-none">
                            Home
                        </a>
                    </li>
                    <span class="mx-2 text-white fw-bolder"> > </span>
                    <li class="breadcrumb-item active fw-bold  text-warning" aria-current="page">
                        Our Services
                    </li>
                </ol>
            </nav>

        </div>
    </section>

    {{-- ============ Our Services (Left content + Sliding cards) ========== --}}
    <section class="services-intro">

        {{-- Split background: left plain white, right image --}}
        <div class="services-bg-split d-none d-lg-flex">
            <div class="bg-left"></div>
            <div class="bg-right"></div>
        </div>

        <div class="container">
            <div class="row align-items-center g-4">

                {{-- Left Content --}}
                <div class="col-lg-4">
                    <span class="text-warning fw-semibold text-uppercase small gap-8 "
                        style="letter-spacing: 5px; font-size: 15px;">
                        Explore SunsetVista Resort
                    </span>

                    <h2 class="display-3 fw-bold mb-4" style="font-family: 'Playfair Display', serif;">
                        Our Services
                    </h2>

                    <p class="text-secondary mb-3">
                        We offer more than just a stay. Visit our service page to see everything we provide.
                    </p>

                    <p class="text-secondary mb-4">
                        Your package can include food, tents, cottages, local guides, trekking trails, and
                        nature walks. Choose the Mussoorie camping package that fits your needs and let us
                        handle the rest.
                    </p>

                    <a href="{{-- route('booking') --}}" class="btn btn-dark px-4 py-3 fw-semibold text-uppercase">
                        Book Now
                    </a>
                </div>

                {{-- Right: Sliding Cards (DB data) --}}
                <div class="col-lg-8">

                    <div class="d-flex align-items-center gap-2">

                        {{-- Left arrow --}}
                        <button type="button" class="services-slider-nav d-flex"
                            onclick="document.getElementById('servicesSlider').scrollBy({left: -340, behavior: 'smooth'})">
                            <i class="bi bi-chevron-left"></i>
                        </button>

                        <div class="services-slider flex-grow-1" id="servicesSlider">

                            {{-- ===== Loop starts here — replace $services with your DB collection ===== --}}
                            @forelse($services as $service)
                                <div class="services-slide-item">
                                    <div class="service-card position-relative rounded-4 overflow-hidden shadow-lg">

                                        {{-- Featured badge --}}
                                        @if ($service->is_featured)
                                            <span
                                                class="badge bg-info text-dark position-absolute top-0 start-0 m-3 rounded-pill px-3 py-2">
                                                Featured
                                            </span>
                                        @endif

                                        {{-- Photo / Video count badge --}}
                                        <div class="position-absolute top-0 end-0 m-3 d-flex gap-2">
                                            <span class="badge bg-dark bg-opacity-75 rounded-pill px-2 py-1">
                                                <i class="bi bi-camera"></i> {{ $service->photo_count }}
                                            </span>
                                            <span class="badge bg-dark bg-opacity-75 rounded-pill px-2 py-1">
                                                <i class="bi bi-play-btn"></i> {{ $service->video_count }}
                                            </span>
                                        </div>
                                        <div class="position-relative">

                                            <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('image/adminlogo.png') }}"
                                                alt="{{ $service->title }}" class="w-100 service-card-img">

                                            <a href="#"
                                                class="btn btn-light rounded-pill position-absolute service-book-btn px-3 py-2 fw-semibold">
                                                Book Now
                                            </a>

                                        </div>

                                        {{-- Details --}}
                                        <div class="service-card-body p-3 bg-white">
                                            <p class="text-success small mb-2">
                                                <i class="bi bi-geo-alt-fill"></i> {{ $service->location }}
                                            </p>

                                            <h5 class="fw-bold mb-2">
                                                {{ $service->title }}
                                            </h5>

                                            <div class="mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="bi bi-star-fill {{ $i <= round($service->rating) ? 'text-warning' : 'text-secondary' }}"></i>
                                                @endfor
                                                <span class="text-secondary small">({{ $service->reviews_count }}
                                                    Review{{ $service->reviews_count > 1 ? 's' : '' }})</span>
                                            </div>

                                            <div class="d-flex gap-3 text-secondary small">
                                                <span><i class="bi bi-clock text-success"></i> {{ $service->nights }}
                                                    Night{{ $service->nights > 1 ? 's' : '' }}</span>
                                                <span><i class="bi bi-question-circle text-success fw-bolder"></i>
                                                    {{ $service->persons }}
                                                    Person{{ $service->persons > 1 ? 's' : '' }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <p class="text-secondary">No services available right now.</p>
                            @endforelse
                            {{-- ===== Loop ends here ===== --}}

                        </div>

                        {{-- Right arrow --}}
                        <button type="button" class="services-slider-nav d-flex"
                            onclick="document.getElementById('servicesSlider').scrollBy({left: 340, behavior: 'smooth'})">
                            <i class="bi bi-chevron-right"></i>
                        </button>

                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        (function() {
            const slider = document.getElementById('servicesSlider');
            if (!slider) return;

            let autoSlideTimer = null;
            let isPaused = false;

            function startAutoSlide() {
                autoSlideTimer = setInterval(() => {
                    if (isPaused) return;

                    const maxScroll = slider.scrollWidth - slider.clientWidth;

                    if (slider.scrollLeft >= maxScroll - 5) {
                        // reached the end, loop back to start
                        slider.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    } else {
                        slider.scrollBy({
                            left: 340,
                            behavior: 'smooth'
                        });
                    }
                }, 3000);
            }

            function pauseAutoSlide() {
                isPaused = true;
            }

            function resumeAutoSlide() {
                isPaused = false;
            }

            // Pause on hover (desktop) and touch (mobile)
            slider.addEventListener('mouseenter', pauseAutoSlide);
            slider.addEventListener('mouseleave', resumeAutoSlide);
            slider.addEventListener('touchstart', pauseAutoSlide, {
                passive: true
            });
            slider.addEventListener('touchend', () => {
                setTimeout(resumeAutoSlide, 2000);
            });

            startAutoSlide();
        })();
    </script>
@endpush
