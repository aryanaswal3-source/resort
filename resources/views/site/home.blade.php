@extends('layout.site-layout')

@section('title', 'Aryan/Resort')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('content')

    {{-- ===== Hero Section (video background) ===== --}}
    <section class="hero-section">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="{{ asset('video/hero-bg.mp4') }}" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <h1 class="hero-heading">Make Memories</h1>
            <p class="hero-subtext">Discover the place where you have fun &amp; enjoy a lot</p>

            <div class="booking-bar">

                <div class="booking-field">
                    <label>Arrival Date</label>
                    <div class="booking-value">
                        <span id="arrivalDate">29/02/2026</span>
                        <i class="bi bi-calendar3"></i>
                    </div>
                </div>

                <div class="booking-field">
                    <label>Departure Date</label>
                    <div class="booking-value">
                        <span id="departureDate">29/02/2026</span>
                        <i class="bi bi-calendar3"></i>
                    </div>
                </div>

                <div class="booking-field">
                    <label>Adults</label>
                    <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                    </select>
                </div>

                <div class="booking-field">
                    <label>Children</label>
                    <select>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                    </select>
                </div>

                <div class="booking-submit">
                   <a href="{{ route('booking.create') }}" class="btn-explore">
                        Check Availability
                        <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>

            </div>
        </div>
    </section>


    {{-- ===== Explore Section ===== --}}
    <section class="explore-section">
        <div class="container">

            <!-- Top heading -->
            <div class="text-center mb-5">
                <p class="section-label mb-2">EXPLORE</p>
                <h2 class="section-title explore-heading">We are cool to give you pleasure</h2>
            </div>

            <div class="row align-items-center g-5">

                <!-- Left: Text content -->
                <div class="col-lg-6 position-relative">

                    <h3 class="section-title explore-subheading mb-4">
                        As much as comfort want to get from us everything
                    </h3>

                    <p class="mb-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eveniet
                        reprehenderit ratione ad perspiciatis repudiandae iste ipsam temporibus sit quo!
                        Incidunt, necessitatibus fugiat ut dignissimos pariatur odit natus ipsum! Obcaecati
                        iste ipsam temporibus sit quo! Incidunt, necessitatibus Obcaecati iste.
                    </p>

                    <p class="mb-4">
                        Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut nim ad minim veniam, quis nostrud
                        exercitation. dolor sit amet, consectetur adipisicing quis nostrud. Konin wansis
                        dolor sit amet, consectetur adipisicing elit dignissimos pariatur
                    </p>

                    <a href="#" class="btn btn-explore">
                        Explore More
                        <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>

                <!-- Right: Image with gold offset border -->
                <div class="col-lg-6">
                    <div class="explore-img-wrap">
                        <img src="{{ asset('image/resort-pool.jpg') }}" alt="Resort pool at sunset">
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== City View Carousel Section ===== --}}
    <section class="cityview-section" style="background-image: url('{{ asset('image/beach-hut.jpg') }}');">
        
        <!-- Top wavy border -->
        <div class="cityview-wave top ">
            <svg viewBox="0 0 1200 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="var(--bg)" d="M0,80 L0.0,20 C9.5,22.5 38.0,30.7 57.1,35.0 C76.2,39.3 95.2,
                    44.2 114.3,46.0 C133.3,47.8 152.3,47.2 171.4,46.0 C190.5,44.8 209.6,39.2 228.6,39.0 C247.6,
                    38.8 266.6,43.7 285.7,45.0 C304.8,46.3 323.8,45.8 342.9,47.0 C361.9,48.2 381.0,53.0 400.0,
                    52.0 C419.0,51.0 438.1,40.8 457.1,41.0 C476.2,41.2 495.2,52.5 514.3,53.0 C533.3,53.5 552.3,
                    43.7 571.4,44.0 C590.5,44.3 609.5,56.2 628.6,55.0 C647.7,53.8 666.7,40.3 685.7,37.0 C704.8,
                    33.7 723.9,32.5 742.9,35.0 C761.9,37.5 781.0,50.7 800.0,52.0 C819.0,53.3 838.1,44.2 857.1,
                    43.0 C876.1,41.8 895.2,44.0 914.3,45.0 C933.3,46.0 952.4,48.0 971.4,49.0 C990.4,50.0 1009.5,
                    50.8 1028.6,51.0 C1047.6,51.2 1066.7,50.5 1085.7,50.0 C1104.8,49.5 1123.9,50.2 1142.9,48.0 C1162.0,
                    45.8 1190.5,38.8 1200.0,37.0  L1200,80 Z" />
            </svg>
        </div>

        <div class="container cityview-card-wrap">
            <div id="cityViewCarousel" class="carousel slide cityview-card position-relative" data-bs-ride="false">

                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <p class="section-label mb-2">CITY VIEW</p>
                        <h3 class="section-title mb-4">A charming view of the city</h3>
                        <p class="mb-3">
                            Ipsum, dolor sit amet consectetur adipisicing elit. Quuntur necessitatibus
                            fugit eligendi accusantium vel quos cupiditate ducimus placeat explicabo
                            distinctio, consectetur imi, a voluptate delectus.
                        </p>
                        <p class="mb-0">
                            Onin wansis dolor sit amet, consectetur adipisicing elit, sed smod tempor
                            incididunt ut labore et dolore magna aliqua. Ad veniam, quis nostrud exercitation
                            consectetur.
                        </p>
                    </div>

                    <div class="carousel-item">
                        <p class="section-label mb-2">BEACH VIEW</p>
                        <h3 class="section-title mb-4">A relaxing view of the beach</h3>
                        <p class="mb-3">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur debitis
                            eos animi possimus repellat, iure nam praesentium voluptatibus dolorum
                            necessitatibus.
                        </p>
                        <p class="mb-0">
                            The view do eiusmod tempor incididunt ut labore et dolore magna aliqua minim
                            veniam quis nostrud exercitation ullamco laboris nisi ut aliquip.
                        </p>
                    </div>

                    <div class="carousel-item">
                        <p class="section-label mb-2">POOL VIEW</p>
                        <h3 class="section-title mb-4">A refreshing view of the pool</h3>
                        <p class="mb-3">
                            Konin wansis dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.
                        </p>
                        <p class="mb-0">
                            Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat duis aute irure dolor in reprehenderit.
                        </p>
                    </div>

                </div>

                <!-- Custom arrows -->
                <button class="cityview-arrow prev" type="button" data-bs-target="#cityViewCarousel" data-bs-slide="prev">
                    <i class="bi bi-arrow-left"></i>
                </button>
                <button class="cityview-arrow next" type="button" data-bs-target="#cityViewCarousel" data-bs-slide="next">
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>
        </div>

        <!-- Bottom wavy border -->
        <div class="cityview-wave bottom">
            <svg viewBox="0 0 1200 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="var(--bg)" d="M0,80 L0.0,20 C9.5,22.5 38.0,30.7 57.1,35.0 C76.2,39.3 95.2,44.2 114.3,
                    46.0 C133.3,47.8 152.3,47.2 171.4,46.0 C190.5,44.8 209.6,39.2 228.6,39.0 C247.6,38.8 266.6,43.7 285.7,
                    45.0 C304.8,46.3 323.8,45.8 342.9,47.0 C361.9,48.2 381.0,53.0 400.0,52.0 C419.0,51.0 438.1,40.8 457.1,
                    41.0 C476.2,41.2 495.2,52.5 514.3,53.0 C533.3,53.5 552.3,43.7 571.4,44.0 C590.5,44.3 609.5,56.2 628.6,
                    55.0 C647.7,53.8 666.7,40.3 685.7,37.0 C704.8,33.7 723.9,32.5 742.9,35.0 C761.9,37.5 781.0,50.7 800.0,
                    52.0 C819.0,53.3 838.1,44.2 857.1,43.0 C876.1,41.8 895.2,44.0 914.3,45.0 C933.3,46.0 952.4,48.0 971.4,
                    49.0 C990.4,50.0 1009.5,50.8 1028.6,51.0 C1047.6,51.2 1066.7,50.5 1085.7,50.0 C1104.8,49.5 1123.9,50.2 1142.9,
                    48.0 C1162.0,45.8 1190.5,38.8 1200.0,37.0  L1200,80 Z" />
            </svg>
        </div>

    </section>

    {{-- ===== Facilities Section ===== --}}
    <section class="facilities-section">
        <div class="container">

            <div class="text-center mb-5">
                <p class="section-label mb-2">FACILITIES</p>
                <h2 class="section-title">Giving entirely awesome</h2>
            </div>

            <div class="row g-4">

                <div class="col-lg-3 col-md-6">
                    <div class="facility-card">
                        <div class="facility-icon"><i class="bi bi-truck"></i></div>
                        <h4 class="section-title">Pick Up &amp; Drop</h4>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <button class="facility-arrow"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="facility-card">
                        <div class="facility-icon"><i class="bi bi-cup-hot"></i></div>
                        <h4 class="section-title">Welcome Drink</h4>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <button class="facility-arrow"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="facility-card">
                        <div class="facility-icon"><i class="bi bi-house-door"></i></div>
                        <h4 class="section-title">Parking Space</h4>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <button class="facility-arrow"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="facility-card">
                        <div class="facility-icon"><i class="bi bi-droplet-half"></i></div>
                        <h4 class="section-title">Cold Hot &amp; Water</h4>
                        <p>parkn ipsum dolor sit amet, consectetur adiing elit sed do eiu</p>
                        <button class="facility-arrow"><i class="bi bi-arrow-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== Our Rooms Section ===== --}}
    <section class="rooms-section">
        <div class="container">

            <div class="text-center mb-5">
                <p class="section-label mb-2">OUR ROOMS</p>
                <h2 class="section-title">Fascinating rooms &amp; suites</h2>
            </div>

            <div class="row g-4 align-items-stretch">

                <!-- Left: feature grid -->
                <div class="col-lg-6">
                    <div class="row g-3 h-100">

                        <div class="col-6">
                            <div class="room-feature-box active">
                                <div class="room-feature-icon"><i class="bi bi-credit-card-2-front"></i></div>
                                <span class="room-feature-tag">Free cost</span>
                                <p class="room-feature-title">No booking fee</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="room-feature-box">
                                <div class="room-feature-icon"><i class="bi bi-award"></i></div>
                                <span class="room-feature-tag">Free cost</span>
                                <p class="room-feature-title">Best rate guarantee</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="room-feature-box">
                                <div class="room-feature-icon"><i class="bi bi-airplane"></i></div>
                                <span class="room-feature-tag">Free cost</span>
                                <p class="room-feature-title">Reservations 24/7</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="room-feature-box">
                                <div class="room-feature-icon"><i class="bi bi-speedometer2"></i></div>
                                <span class="room-feature-tag">Free cost</span>
                                <p class="room-feature-title">High-speed Wi-Fi</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="room-feature-box">
                                <div class="room-feature-icon"><i class="bi bi-cup-hot"></i></div>
                                <span class="room-feature-tag">Free cost</span>
                                <p class="room-feature-title">Free breakfast</p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="room-feature-box">
                                <div class="room-feature-icon"><i class="bi bi-person"></i></div>
                                <span class="room-feature-tag">100% free</span>
                                <p class="room-feature-title">One person free</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right: room image -->
                <div class="col-lg-6">
                    <div class="rooms-img-wrap h-100">
                        <img src="{{ asset('image/room-bed.jpg') }}" alt="Resort room with pillows">
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ===== Countdown / Last Minute Offer Section ===== --}}
    <section class="countdown-section" style="background-image: url('{{ asset('image/ocean-rocks.jpg') }}');">
        
        <div class="section-wave top">
            <svg viewBox="0 0 1200 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="var(--bg)" d="M0,80 L0.0,20 C9.5,22.5 38.0,30.7 57.1,35.0 C76.2,39.3 95.2,
                    44.2 114.3,46.0 C133.3,47.8 152.3,47.2 171.4,46.0 C190.5,44.8 209.6,39.2 228.6,39.0 C247.6,
                    38.8 266.6,43.7 285.7,45.0 C304.8,46.3 323.8,45.8 342.9,47.0 C361.9,48.2 381.0,53.0 400.0,52.0 C419.0,
                    51.0 438.1,40.8 457.1,41.0 C476.2,41.2 495.2,52.5 514.3,53.0 C533.3,53.5 552.3,43.7 571.4,44.0 C590.5,
                    44.3 609.5,56.2 628.6,55.0 C647.7,53.8 666.7,40.3 685.7,37.0 C704.8,33.7 723.9,32.5 742.9,35.0 C761.9,
                    37.5 781.0,50.7 800.0,52.0 C819.0,53.3 838.1,44.2 857.1,43.0 C876.1,41.8 895.2,44.0 914.3,45.0 C933.3,
                    46.0 952.4,48.0 971.4,49.0 C990.4,50.0 1009.5,50.8 1028.6,51.0 C1047.6,51.2 1066.7,50.5 1085.7,50.0 C1104.8,
                    49.5 1123.9,50.2 1142.9,48.0 C1162.0,45.8 1190.5,38.8 1200.0,37.0  L1200,80 Z" />
            </svg>
        </div>

        <div class="container">
            <p class="countdown-label mb-2">LAST MINUTE!</p>
            <h2 class="countdown-heading">
                <span class="script-part">Incredible!</span><span class="bold-part">Are you coming today</span>
            </h2>

            <div class="countdown-timer">
                <div class="countdown-unit">
                    <span class="num">520</span>
                    <span class="label">DAYS</span>
                </div>
                <div class="countdown-unit">
                    <span class="num">14</span>
                    <span class="label">HOURS</span>
                </div>
                <div class="countdown-unit">
                    <span class="num">09</span>
                    <span class="label">MINUTES</span>
                </div>
                <div class="countdown-unit">
                    <span class="num">28</span>
                    <span class="label">SECONDS</span>
                </div>
            </div>

            <a href="#" class="btn-join">
                Join Us Today
                <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
            </a>
        </div>

        <div class="section-wave bottom">
            <svg viewBox="0 0 1200 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="var(--bg)" d="M0,80 L0.0,20 C9.5,22.5 38.0,30.7 57.1,35.0 C76.2,39.3 95.2,44.2 114.3,
                    46.0 C133.3,47.8 152.3,47.2 171.4,46.0 C190.5,44.8 209.6,39.2 228.6,39.0 C247.6,38.8 266.6,43.7 285.7,
                    45.0 C304.8,46.3 323.8,45.8 342.9,47.0 C361.9,48.2 381.0,53.0 400.0,52.0 C419.0,51.0 438.1,40.8 457.1,
                    41.0 C476.2,41.2 495.2,52.5 514.3,53.0 C533.3,53.5 552.3,43.7 571.4,44.0 C590.5,44.3 609.5,56.2 628.6,
                    55.0 C647.7,53.8 666.7,40.3 685.7,37.0 C704.8,33.7 723.9,32.5 742.9,35.0 C761.9,37.5 781.0,50.7 800.0,
                    52.0 C819.0,53.3 838.1,44.2 857.1,43.0 C876.1,41.8 895.2,44.0 914.3,45.0 C933.3,46.0 952.4,48.0 971.4,
                    49.0 C990.4,50.0 1009.5,50.8 1028.6,51.0 C1047.6,51.2 1066.7,50.5 1085.7,50.0 C1104.8,49.5 1123.9,
                    50.2 1142.9,48.0 C1162.0,45.8 1190.5,38.8 1200.0,37.0  L1200,80 Z" />
            </svg>
        </div>

    </section>
    
{{-- ===== Exclusive Offers Section ===== --}}
    <section class="offers-section">
        <div class="container">

            <div class="text-center mb-5">
                <p class="section-label mb-2">EXCLUSIVE OFFERS</p>
                <h2 class="section-title">You can get an exclusive offer</h2>
            </div>

            <div class="row g-4">

                @forelse ($services as $service)
                    <div class="col-lg-6">
                        <div class="row g-3 offer-card align-items-stretch">
                            <div class="col-5">
                                <div class="offer-img-wrap">
                                    <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('image/adminlogo.png') }}" alt="{{ $service->title }}" class="offer-img">
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="offer-details">
                                    <h4 class="section-title">{{ $service->title }}</h4>
                                    <div class="offer-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bi bi-star-fill {{ $i <= round($service->rating) ? '' : 'text-secondary opacity-25' }}"></i>
                                        @endfor
                                    </div>
                                    <p>{{ Str::limit($service->description, 70) }}</p>
                                    <span class="offer-price">From ₹{{ number_format($service->price, 0) }}/night</span>
                                    <a href="{{ route('booking.create') }}" class="btn-explore">
                                        Book Online
                                        <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        No rooms available right now.
                    </div>
                @endforelse

            </div>
        </div>
    </section>

    {{-- ===== Area We Cover / Restaurant Tabs Section ===== --}}
    <section class="area-section">
        <div class="container">

            <div class="text-center mb-5">
                <p class="section-label mb-2">RESTAURANT</p>
                <h2 class="section-title">The area we cover under ecorik</h2>
            </div>

            <div class="row align-items-start">

                <div class="col-lg-6">
                    <div class="area-img-wrap">
                        <img src="{{ asset('image/restaurant.jpg') }}" alt="Restaurant">
                    </div>
                </div>

                <div class="col-lg-6 ps-lg-5">

                    <ul class="nav area-tabs" id="areaTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="restaurant-tab" data-bs-toggle="tab"
                                data-bs-target="#restaurant-pane" type="button" role="tab">Restaurant</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pool-tab" data-bs-toggle="tab" data-bs-target="#pool-pane"
                                type="button" role="tab">Swimming pool</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="conference-tab" data-bs-toggle="tab"
                                data-bs-target="#conference-pane" type="button" role="tab">Conference room</button>
                        </li>
                    </ul>

                    <div class="tab-content area-content" id="areaTabContent">

                        <div class="tab-pane fade show active" id="restaurant-pane" role="tabpanel">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat atque quibusdam fuga natus
                                necessitatibus eveniet maiores nostrum esse ut voluptates sint dolores, voluptatum
                                consequatur ad est enim perferendis nostrum esse ut voluptates dolores consectetur
                                voluptates.</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur
                                dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi
                                quasi cumque</p>
                            <a href="#" class="btn-explore">
                                Learn About
                                <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                            </a>
                        </div>

                        <div class="tab-pane fade" id="pool-pane" role="tabpanel">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat atque quibusdam fuga natus
                                necessitatibus eveniet maiores nostrum esse ut voluptates sint dolores, voluptatum
                                consequatur ad est enim perferendis nostrum esse ut voluptates dolores consectetur
                                voluptates.</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur
                                dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi
                                quasi cumque</p>
                            <a href="#" class="btn-explore">
                                Learn About
                                <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                            </a>
                        </div>

                        <div class="tab-pane fade" id="conference-pane" role="tabpanel">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat atque quibusdam fuga natus
                                necessitatibus eveniet maiores nostrum esse ut voluptates sint dolores, voluptatum
                                consequatur ad est enim perferendis nostrum esse ut voluptates dolores consectetur
                                voluptates.</p>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis, soluta, aspernatur
                                dolorum sequi quisquam ullam in pariatur nihil dolorem cumque excepturi totam. Qui excepturi
                                quasi cumque</p>
                            <a href="#" class="btn-explore">
                                Learn About
                                <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- ===== Special Offers Section (gold bg) ===== --}}
    <section class="special-offers-section">
        <div class="container position-relative">

            <div class="text-center mb-5">
                <p class="section-label mb-2">EXCLUSIVE OFFERS</p>
                <h2 class="section-title">You can get an exclusive offer</h2>
            </div>

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="offer2-card">
                        <span class="offer2-label">Up to 30% off</span>
                        <h4>Swimming for man</h4>
                        <div class="offer2-rating">4.5 <span>(432 Reviews)</span></div>
                        <p class="offer2-desc">Swimming doller dolor sit aet odu tur adiing elitse</p>
                        <div class="offer2-meta">
                            <span><i class="bi bi-clock"></i>Duration: 2 Hours</span>
                            <span><i class="bi bi-record-circle"></i>18+ years</span>
                        </div>
                       <a href="{{ route('booking.create') }}" class="btn-explore">
                            Book Online
                            <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="offer2-card">
                        <span class="offer2-label">This month only</span>
                        <h4>₹5 Breakfast package</h4>
                        <div class="offer2-rating">5.0 <span>(580 Reviews)</span></div>
                        <p class="offer2-desc">Start ₹500 doller dolor sit aet odeu tur adiing elitse</p>
                        <div class="offer2-meta">
                            <span><i class="bi bi-clock"></i>Duration: 2 Hours</span>
                            <span><i class="bi bi-record-circle"></i>18+ years</span>
                        </div>
                      <a href="{{ route('booking.create') }}" class="btn-explore">
                            Book Online
                            <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="offer2-card">
                        <span class="offer2-label">30% off only this week</span>
                        <h4>Free fitness club for women</h4>
                        <div class="offer2-rating">4.9 <span>(580 Reviews)</span></div>
                        <p class="offer2-desc">Start ₹5 doller dolor sit aet odeu tur adiing elitse</p>
                        <div class="offer2-meta">
                            <span><i class="bi bi-clock"></i>Duration: 2 Hours</span>
                            <span><i class="bi bi-record-circle"></i>18+ years</span>
                        </div>
                        <a href="{{ route('booking.create') }}" class="btn-explore">
                            Book Online
                            <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== Testimonials Section ===== --}}
    <section class="testimonials-section">
        <div class="container">

            <div class="text-center mb-5">
                <p class="section-label mb-2">TESTIMONIALS</p>
                <h2 class="section-title">What customers say</h2>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="false">
                <div class="testimonial-card">

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <div class="testimonial-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h4>Excellent hotel</h4>
                            <p class="testimonial-quote">"Hotel ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat veniam, quis
                                nostrud exercitation enim ad minim consectetur"</p>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h4>Great experience</h4>
                            <p class="testimonial-quote">"Hotel ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat veniam, quis
                                nostrud exercitation enim ad minim consectetur"</p>
                        </div>

                        <div class="carousel-item">
                            <div class="testimonial-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <h4>Loved the stay</h4>
                            <p class="testimonial-quote">"Hotel ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat veniam, quis
                                nostrud exercitation enim ad minim consectetur"</p>
                        </div>

                    </div>

                    <div class="testimonial-people">
                        <button type="button" class="testimonial-person active" data-bs-target="#testimonialCarousel"
                            data-bs-slide-to="0">
                            <img src="{{ asset('image/avatar-1.jpg') }}" alt="Ayman Jenis">
                            <div class="person-info">
                                <strong>Aryan Aswal</strong>
                                <span>Ary@ceo</span>
                            </div>
                        </button>
                        <button type="button" class="testimonial-person" data-bs-target="#testimonialCarousel"
                            data-bs-slide-to="1">
                            <img src="{{ asset('image/avatar-2.jpg') }}" alt="Juhon Smit">
                            <div class="person-info">
                                <strong>Juhon Smit</strong>
                                <span>Manager</span>
                            </div>
                        </button>
                        <button type="button" class="testimonial-person" data-bs-target="#testimonialCarousel"
                            data-bs-slide-to="2">
                            <img src="{{ asset('image/avatar-3.jpg') }}" alt="Dew Kath">
                            <div class="person-info">
                                <strong>Dew Kath</strong>
                                <span>Founder</span>
                            </div>
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{-- ===== Auto-Scrolling Gallery Section ===== --}}
    <section class="gallery-marquee-section">
        <div class="gallery-marquee-track">

            @for ($i = 0; $i < 2; $i++)
                <div class="gallery-item">
                    <img src="{{ asset('image/gallery-1.jpg') }}" alt="Gallery">
                    <div class="gallery-overlay"><i class="bi bi-instagram"></i></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('image/gallery-2.jpg') }}" alt="Gallery">
                    <div class="gallery-overlay"><i class="bi bi-instagram"></i></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('image/gallery-3.jpg') }}" alt="Gallery">
                    <div class="gallery-overlay"><i class="bi bi-instagram"></i></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('image/gallery-4.jpg') }}" alt="Gallery">
                    <div class="gallery-overlay"><i class="bi bi-instagram"></i></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('image/gallery-5.jpg') }}" alt="Gallery">
                    <div class="gallery-overlay"><i class="bi bi-instagram"></i></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ asset('image/gallery-6.jpg') }}" alt="Gallery">
                    <div class="gallery-overlay"><i class="bi bi-instagram"></i></div>
                </div>
            @endfor

        </div>
    </section>

    {{-- ===== Our Blog Section ===== --}}
    <section class="blog-section">
        <div class="container">

            <div class="text-center mb-5">
                <p class="section-label mb-2">OUR BLOG</p>
                <h2 class="section-title">News &amp; articles updates</h2>
            </div>

            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img-wrap">
                            <img src="{{ asset('image/blog-1.jpg') }}" alt="Hotel">
                            <span class="blog-ribbon">HOTEL</span>
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span><i class="bi bi-person"></i>Admin</span>
                                <span><i class="bi bi-chat-left-text"></i>Comment</span>
                            </div>
                            <h4><a href="#">Celebrating Decade Years Of Hotel In 2026</a></h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veritatis veniam corrupti
                                perferendis.</p>
                            <a href="#" class="blog-readmore">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img-wrap">
                            <img src="{{ asset('image/blog-2.jpg') }}" alt="Price">
                            <span class="blog-ribbon">PRICE</span>
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span><i class="bi bi-person"></i>Admin</span>
                                <span><i class="bi bi-chat-left-text"></i>Comment</span>
                            </div>
                            <h4><a href="#">A Perfect Day With Businessman At Ecorik Hotel</a></h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veritatis veniam corrupti
                                perferendis.</p>
                            <a href="#" class="blog-readmore">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-card">
                        <div class="blog-img-wrap">
                            <img src="{{ asset('image/blog-3.jpg') }}" alt="Store">
                            <span class="blog-ribbon">STORE</span>
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta">
                                <span><i class="bi bi-person"></i>Admin</span>
                                <span><i class="bi bi-chat-left-text"></i>Comment</span>
                            </div>
                            <h4><a href="#">Celebrating Decade Years Of Hotel In 2026</a></h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fuga veritatis veniam corrupti
                                perferendis.</p>
                            <a href="#" class="blog-readmore">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection

@push('scripts')
@endpush
