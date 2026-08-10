@extends('layout.site-layout')

@section('title', 'About-Sunset-Vista-Resort')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/aboutpg.css') }}">
@endpush

@section('content')

    <section class="page-banner d-flex align-items-center">
        <div class="page-banner-overlay"></div>
        <div class="container position-relative">
            <div class="page-banner-content text-center">
                <h1 class="display-3 fw-bold text-white lh-lg" style="font-family: 'Playfair Display', serif; ">
                    About
                </h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Pages</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            About Us
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <section class="explore-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-subtitle">EXPLORE</span>
                <h2 class="section-title">We are cool to give you pleasure</h2>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="explore-image">
                        <img src="{{ asset('image/explore.jpg') }}" alt="Resort Pool" class="img-fluid rounded">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="explore-content ps-lg-4">
                        <h3 class="explore-heading">As much as comfort want to get from us everything</h3>
                        <p class="explore-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eveniet
                            reprehenderit ratione ad perspiciatis repudiandae iste ipsam temporibus sit quo!
                            Incidunt, necessitatibus fugiat ut dignissimos pariatur odit natus ipsum! Obcaecati
                            iste ipsam temporibus sit quo! Incidunt, necessitatibus Obcaecati iste ipsam
                            temporibus.
                        </p>
                        <p class="explore-text">
                            Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut nim ad minim veniam, quis nostrud
                            exercitation. dolor sit amet, consectetur adipisicing quis nostrud exercitation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======Room section======== --}}
    <section class="rooms-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-subtitle">OUR ROOMS</span>
                <h2 class="section-title">Fascinating rooms &amp; suites</h2>
            </div>

            <div class="row">
                <!-- Left: Room List (Tabs) -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="nav flex-column room-tabs" id="room-tab" role="tablist">

                        <button class="room-tab-item active" data-bs-toggle="pill" data-bs-target="#room-double"
                            type="button" role="tab">
                            <img src="{{ asset('image/room/DobuleRoom.jpg') }}" alt="Double Room">
                            <div class="room-tab-text">
                                <h5>Double Room</h5>
                                <span>From ₹7500.0/night</span>
                            </div>
                        </button>

                        <button class="room-tab-item" data-bs-toggle="pill" data-bs-target="#room-luxury" type="button"
                            role="tab">
                            <img src="{{ asset('image/room/LuxuryRoom.jpg') }}" alt="Luxury Room">
                            <div class="room-tab-text">
                                <h5>Luxury Room</h5>
                                <span>From ₹5000.0/night</span>
                            </div>
                        </button>

                        <button class="room-tab-item" data-bs-toggle="pill" data-bs-target="#room-best" type="button"
                            role="tab">
                            <img src="{{ asset('image/room/BestRoom.jpg') }}" alt="Best Room">
                            <div class="room-tab-text">
                                <h5>Best Room</h5>
                                <span>From ₹5500.0/night</span>
                            </div>
                        </button>

                        <button class="room-tab-item" data-bs-toggle="pill" data-bs-target="#room-classic" type="button"
                            role="tab">
                            <img src="{{ asset('image/room/ClassicRoom.jpg') }}" alt="Classic Room">
                            <div class="room-tab-text">
                                <h5>Classic Room</h5>
                                <span>From ₹9000.0/night</span>
                            </div>
                        </button>

                        <button class="room-tab-item" data-bs-toggle="pill" data-bs-target="#room-budget" type="button"
                            role="tab">
                            <img src="{{ asset('image/room/BudgetRoom.jpg') }}" alt="Budget Room">
                            <div class="room-tab-text">
                                <h5>Budget Room</h5>
                                <span>From ₹4000.0/night</span>
                            </div>
                        </button>

                    </div>
                </div>

                <!-- Right: Room Preview -->
                <div class="col-lg-8">
                    <div class="tab-content h-100" id="room-tabContent">

                        <div class="tab-pane fade show active room-preview" id="room-double" role="tabpanel">
                            <img src="{{ asset('image/room/DobuleRoom.jpg') }}" alt="Double Room" class="img-fluid rounded">
                            <span class="room-preview-caption">The Preview Of Double Room</span>
                        </div>

                        <div class="tab-pane fade room-preview" id="room-luxury" role="tabpanel">
                            <img src="{{ asset('image/room/LuxuryRoom.jpg') }}" alt="Luxury Room" class="img-fluid rounded">
                            <span class="room-preview-caption">The Preview Of Luxury Room</span>
                        </div>

                        <div class="tab-pane fade room-preview" id="room-best" role="tabpanel">
                            <img src="{{ asset('image/room/BestRoom.jpg') }}" alt="Best Room" class="img-fluid rounded">
                            <span class="room-preview-caption">The Preview Of Best Room</span>
                        </div>

                        <div class="tab-pane fade room-preview" id="room-classic" role="tabpanel">
                            <img src="{{ asset('image/room/ClassicRoom.jpg') }}" alt="Classic Room"
                                class="img-fluid rounded">
                            <span class="room-preview-caption">The Preview Of Classic Room</span>
                        </div>

                        <div class="tab-pane fade room-preview" id="room-budget" role="tabpanel">
                            <img src="{{ asset('image/room/BudgetRoom.jpg') }}" alt="Budget Room"
                                class="img-fluid rounded">
                            <span class="room-preview-caption">The Preview Of Budget Room</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- ======city view ============= --}}
    <section class="city-view-section">

        <!-- Fixed single background image -->
        <div class="city-view-bg" style="background-image: url('{{ asset('image/CityViewBg.jpg') }}');"></div>

        <!-- Sliding content card -->
        <div id="cityViewCarousel" class="carousel slide city-view-carousel" data-bs-ride="carousel"
            data-bs-interval="2000">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="city-view-card">
                        <span class="section-subtitle">THE CITY VIEW</span>
                        <h2 class="city-view-title">A charming view of the city town</h2>
                        <p class="city-view-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur
                            necessitatibus fugit eligendi accusantium vel quos debitis cupiditate.

                        </p>
                        <p class="city-view-text">
                            The view onin wansis dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.

                        </p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="city-view-card">
                        <span class="section-subtitle">THE BEACH VIEW</span>
                        <h2 class="city-view-title">An amazing view of the beach</h2>
                        <p class="city-view-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur
                            necessitatibus fugit eligendi accusantium vel quos debitis cupiditate.
                        </p>
                        <p class="city-view-text">
                            The view onin wansis dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore.
                        </p>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="city-view-card">
                        <span class="section-subtitle">THE POOL VIEW</span>
                        <h2 class="city-view-title">A relaxing view of the pool</h2>
                        <p class="city-view-text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur
                            necessitatibus fugit eligendi accusantium vel quos debitis.
                        </p>
                        <p class="city-view-text">
                            The view onin wansis dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Manual Arrows -->
            <button class="carousel-control-prev city-carousel-arrow" type="button" data-bs-target="#cityViewCarousel"
                data-bs-slide="prev">
                <span class="arrow-icon">&larr;</span>
            </button>
            <button class="carousel-control-next city-carousel-arrow" type="button" data-bs-target="#cityViewCarousel"
                data-bs-slide="next">
                <span class="arrow-icon">&rarr;</span>
            </button>

        </div>

    </section>

    {{-- ================Dark Bg section============= --}}
    <section class="stats-section">
        <div class="stats-pattern"></div>
        <div class="container position-relative">
            <div class="row text-center">

                <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="stat-item">
                        <h4 class="stat-label">Beaches</h4>
                        <div class="stat-number">
                            <span class="counter" data-target="50">0</span><span class="stat-plus">+</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="stat-item">
                        <h4 class="stat-label">Spa offers</h4>
                        <div class="stat-number">
                            <span class="counter" data-target="95">0</span><span class="stat-plus">+</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <h4 class="stat-label">Rooms</h4>
                        <div class="stat-number">
                            <span class="counter" data-target="45">0</span><span class="stat-plus">+</span>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <h4 class="stat-label">Happy client</h4>
                        <div class="stat-number">
                            <span class="counter" data-target="20">0</span><span class="stat-plus">K</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ===============sliding card=================  --}}
    <section class="testimonial-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-subtitle">TESTIMONIALS</span>
                <h2 class="section-title">What customers say</h2>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                <div class="carousel-inner">

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row g-4">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-md-4">
                                    <div class="testimonial-card">
                                        <div class="testimonial-stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <h5 class="testimonial-title">Excellent hotel</h5>
                                        <p class="testimonial-text">
                                            "Awesome yksum dolor sit ametco elit, sed do eiusmod tempor incididunt et md do
                                            eiusmoeiusmod tempor inte emamnsecacing eiusmoeiusmod"
                                        </p>
                                        <div class="testimonial-author">
                                            <img src="{{ asset('image/avatar-1.jpg') }}"
                                                alt="Aryan Jenis">
                                            <div>
                                                <h6>Aryan Aswal</h6>
                                                <span>CEO@Leasuely</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row g-4">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-md-4">
                                    <div class="testimonial-card">
                                        <div class="testimonial-stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <h5 class="testimonial-title">Great experience</h5>
                                        <p class="testimonial-text">
                                            "Awesome yksum dolor sit ametco elit, sed do eiusmod tempor incididunt et md do
                                            eiusmoeiusmod tempor inte emamnsecacing eiusmoeiusmod"
                                        </p>
                                        <div class="testimonial-author">
                                            <img src="{{ asset('image/avatar-2.jpg') }}"
                                                alt="Guest">
                                            <div>
                                                <h6>Sarah Khan</h6>
                                                <span>Traveler</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                </div>

                <!-- Manual Arrows -->
                <button class="carousel-control-prev testimonial-arrow" type="button"
                    data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="arrow-icon">&larr;</span>
                </button>
                <button class="carousel-control-next testimonial-arrow" type="button"
                    data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="arrow-icon">&rarr;</span>
                </button>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.room-tab-item');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            let started = false;

            function animateCounters() {
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    let count = 0;
                    const speed = 30; // lower = faster
                    const increment = Math.ceil(target / 50);

                    const updateCount = () => {
                        count += increment;
                        if (count >= target) {
                            counter.innerText = target;
                        } else {
                            counter.innerText = count;
                            setTimeout(updateCount, speed);
                        }
                    };
                    updateCount();
                });
            }

            // Trigger animation when section comes into view
            const statsSection = document.querySelector('.stats-section');
            if (statsSection) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !started) {
                            animateCounters();
                            started = true;
                        }
                    });
                }, {
                    threshold: 0.3
                });

                observer.observe(statsSection);
            }
        });
    </script>
@endpush
