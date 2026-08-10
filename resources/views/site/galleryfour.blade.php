@extends('layout.site-layout')

@section('title', 'Gallery-Sunset-Vista-Resort')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    <style>
        .page-banner {
            background: url("{{ asset('image/about-banner.jpg') }}") center/cover no-repeat;
            min-height: 480px;
        }
    </style>
@endpush

@section('content')
    {{-- ============ Gallery banner ========== --}}
    <section class="page-banner position-relative d-flex align-items-center">

        <div class="page-banner-overlay position-absolute top-0 start-0 w-100 h-100"></div>

        <div class="container position-relative text-center">

            <h1 class="display-3 fw-bold text-white  lh-lg" style="font-family: 'Playfair Display', serif; ">
                Gallery
            </h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white fw-bold text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active fw-medium" aria-current="page">
                        Gallery
                    </li>

                    <li class="breadcrumb-item active fw-medium " aria-current="page">
                        Gallery Columns
                    </li>

                </ol>
            </nav>

        </div>

    </section>


    <section class="gallery-section">
        <div class="container text-center">
            <div class="eyebrow mb-3">GALLERY</div>
            <h2>Our Specials Room</h2>
            <p class="desc lh-lg ">Lorem ipsum dolor sit amconsectetur Risus commodo viverra maecenas acumsan lacus vel
                facilisisLorem dolor sitonsectetur Risus commodo.</p>

            <!-- FILTER TABS -->
            <div class="filter-tabs mt-8 gap-52 ">
                <button class="active"><i class="fa fa-plus fs-5 fw-bolder"></i> All</button>
                <button><i class="bi bi-bookmark-plus fs-5 fw-bolder"></i> Certified</button>
                <button><i class="bi bi-person-circle fs-5 fw-bolder"></i> Used</button>
                <button><i class="bi bi-newspaper fs-5 fw-bolder"></i> New</button>
            </div>

            <!-- ROOM GRID -->
            <div class="row">
                {{-- 
                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=500" alt="room">
                        <div class="price-badge "><small class="fw-semibold ">Price</small><span
                                class="amount ">₹1000.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Double Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold">Price</small><span
                                class="amount">₹1500.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Budget Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold">Price</small><span
                                class="amount">₹2000.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Luxury Suite</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold">Price</small><span
                                class="amount">₹1800.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Deluxe Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold ">Price</small><span
                                class="amount">₹1500.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Classic Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1591088398332-8a7791972843?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold ">Price</small><span
                                class="amount">₹1400.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Budget Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold">Price</small><span
                                class="amount">₹1700.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Cozy Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-3">
                    <div class="room-card">
                        <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?w=500" alt="room">
                        <div class="price-badge"><small class=" fw-semibold">Price</small><span
                                class="amount">₹1800.00</span></div>
                        <div class="info-card">
                            <div class="tag">(New)</div>
                            <h5>Modern Room</h5>
                            <a href="#">View More <i class="fa fa-arrow-right "></i></a>
                        </div>
                    </div>
                </div> --}}
                @forelse ($images as $image)
                    <div class="col-6 col-md-3">
                        <div class="room-card">

                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                alt="{{ $image->title ?? 'Gallery image' }}">

                            <!-- Price -->
                            <div class="price-badge">
                                <small class="fw-semibold">Price</small>
                                <span class="amount">
                                    ₹{{ number_format($image->price, 2) }}
                                </span>
                            </div>

                            <!-- Info -->
                            <div class="info-card">
                                <div class="tag">(New)</div>
                                <h5>{{ $image->title ?? 'Untitled' }}</h5>

                                <a href="#">
                                    View More <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>

                        </div>
                    </div>

                @empty

                    <div class="col-12 text-center">
                        <h4>No Images Found</h4>
                    </div>
                @endforelse

            </div>

            <div class="view-more-wrap">
                <a href="#" class="btn-view-more">View More <span class="circle"><i
                            class="fa fa-arrow-right "></i></span></a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endpush
