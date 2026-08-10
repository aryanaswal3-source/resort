@extends('layout.site-layout')

@section('title', 'Booking')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                Booking
            </h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">

                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-white fw-bold text-decoration-none">
                            Home
                        </a>
                    </li>

                    <li class="breadcrumb-item active fw-bold" aria-current="page">
                        <a href="{{ url('/contact') }}" class="text-white fw-bold text-decoration-none">
                            Contact
                        </a>
                    </li>

                </ol>
            </nav>

        </div>

    </section>
    {{-- ===== Intro Heading ===== --}}
    <section class="pt-5 pb-2">
        <div class="container text-center">
            <p class="text-uppercase fw-semibold small mb-2" style="color: var(--gold); letter-spacing: .2em;">
                RESERVE YOUR STAY
            </p>
            <h2 class="fw-bold mb-2" style="font-family: 'Playfair Display', serif; color: var(--navy);">
                Book Your Perfect Getaway
            </h2>
            <p class="text-muted">Fill in your details below and our team will confirm your reservation shortly.</p>
        </div>
    </section>


    <section class="pb-2">
        <div class="container">
            <div class="container position-relative">
                <div class="row g-4">

                    <!-- Left Side Booking Form -->
                    <section class="py-5">
                        <div class="container position-relative">

                            {{-- ===== Hanging Poster (decorative, desktop only) ===== --}}
                            <div class="hanging-poster d-none d-xl-block">
                                <div class="poster-pin"></div>
                                <div class="poster-rope"></div>
                                <div class="poster-card">
                                    <i class="bi bi-suitcase-lg poster-icon"></i>
                                    <h6 class="poster-sub">BOOK YOUR</h6>
                                    <h5 class="poster-main">DREAM STAY</h5>
                                    <div class="poster-divider"></div>
                                    <p class="poster-note">Limited Rooms Available</p>
                                </div>
                            </div>

                            <div class="row g-4">
                                {{-- ...tera existing form column aur sidebar column yahan waisa hi rahega... --}}
                            </div>

                        </div>
                    </section>



                    <div class="col-lg-8">

                        <div class="card shadow border-0 rounded-4">
                            <div class="card-body p-4">

                                <h3 class="mb-4 fw-bold">Booking Details</h3>

                                <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                                    @csrf

                                    <div class="row">

                                        <!-- Name -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-person-fill me-1"
                                                    style="color: var(--gold);"></i> Full Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Enter Full Name" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-envelope-fill me-1"
                                                    style="color: var(--gold);"></i> Email Address</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter Email" required>
                                        </div>

                                        <!-- Phone -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-telephone-fill me-1"
                                                    style="color: var(--gold);"></i> Phone Number</label>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Enter Phone Number" required>
                                        </div>

                                        <!-- Room Type -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-door-open-fill me-1"
                                                    style="color: var(--gold);"></i> Room Type</label>
                                            <select name="service_id" id="serviceSelect" class="form-select" required>
                                                <option value="">Select Room</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" data-price="{{ $service->price }}">
                                                        {{ $service->title }} —
                                                        ₹{{ number_format($service->price, 0) }}/night
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Check In -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-calendar-check-fill me-1"
                                                    style="color: var(--gold);"></i> Check In Date</label>
                                            <input type="date" name="check_in_date" id="mainCheckIn" class="form-control"
                                                required>
                                        </div>

                                        <!-- Check Out -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-calendar-x-fill me-1"
                                                    style="color: var(--gold);"></i> Check Out Date</label>
                                            <input type="date" name="check_out_date" id="mainCheckOut"
                                                class="form-control" required>
                                        </div>

                                        <!-- Adults -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-people-fill me-1"
                                                    style="color: var(--gold);"></i> Adults</label>
                                            <input type="number" name="adults" class="form-control" min="1"
                                                value="{{ $prefill['adults'] }}">
                                        </div>

                                        <!-- Children -->
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label"><i class="bi bi-emoji-smile-fill me-1"
                                                    style="color: var(--gold);"></i> Children</label>
                                            <input type="number" name="children" class="form-control" min="0"
                                                value="{{ $prefill['children'] }}">
                                        </div>
                                        <!-- Message -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label"><i class="bi bi-chat-left-text-fill me-1"
                                                    style="color: var(--gold);"></i> Special Request</label>
                                            <textarea name="message" rows="4" class="form-control" placeholder="Write your message..."></textarea>
                                        </div>
                                        <!-- Button -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success w-100 py-3 rounded-pill">
                                                Book Now
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-4">

                        <!-- Booking Summary -->
                        <div class="card shadow border-0 rounded-4 mb-4">

                            <div class="card-body">

                                <h4 class="fw-bold mb-4">
                                    Booking Summary
                                </h4>

                                <div class="d-flex justify-content-between mb-3">
                                    <span>Room Price</span>
                                    <strong id="summaryRoomPrice">₹0</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <span>Nights</span>
                                    <strong id="summaryNights">0</strong>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <span>GST (18%)</span>
                                    <strong id="summaryGst">₹0</strong>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between">

                                    <h5>Total</h5>

                                    <h5 class="text-success" id="summaryTotal">
                                        ₹0
                                    </h5>

                                </div>

                            </div>

                        </div>
                        <!-- Calendar -->
                        <div class="card shadow border-0 rounded-4 mb-4">

                            <div class="card-body">

                                <h4 class="fw-bold mb-1">Select Your Dates</h4>
                                <p class="text-muted small mb-3">Choose check-in and check-out dates for your booking</p>

                                <input type="text" id="calendar" hidden>

                                <div class="calendar-legend mt-2 mb-1">
                                    <span><i class="legend-dot legend-selected"></i> Selected</span>
                                    <span><i class="legend-dot legend-range"></i> Date Range</span>
                                    <span><i class="legend-dot legend-today"></i> Today</span>
                                </div>

                                <div class="booking-summary-box mt-3">

                                    <h5 class="mb-3">📅 Your Selected Dates</h5>

                                    <div class="date-row">
                                        <span>Check-in</span>
                                        <strong id="checkin">Not Selected</strong>
                                    </div>

                                    <div class="date-row">
                                        <span>Check-out</span>
                                        <strong id="checkout">Not Selected</strong>
                                    </div>

                                    <div class="date-row">
                                        <span>Total Nights</span>
                                        <strong id="nights">0</strong>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <script id="fullyBookedData" type="application/json">
                           {!! json_encode($fullyBookedDates) !!}
                        </script>

                        <button type="button" id="sidebarBookBtn"
                            class="btn btn-success w-100 py-3 rounded-pill fw-bold">
                            Book Now
                        </button>
    </section>

    {{-- ===== Why Book With Us ===== --}}
    <section class="py-5" style="background: #faf9f7;">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-uppercase fw-semibold small mb-2" style="color: var(--gold); letter-spacing: .2em;">
                    OUR PROMISE
                </p>
                <h2 class="fw-bold" style="font-family: 'Playfair Display', serif; color: var(--navy);">
                    Why Book With Us
                </h2>
            </div>

            <div class="row g-4 text-center">

                <div class="col-md-3 col-6">
                    <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                        <i class="bi bi-tag-fill fs-1 mb-3 d-block" style="color: var(--gold);"></i>
                        <h6 class="fw-bold mb-2">Best Price Guarantee</h6>
                        <p class="text-muted small mb-0">Find a lower price? We'll match it, no questions asked.</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                        <i class="bi bi-arrow-counterclockwise fs-1 mb-3 d-block" style="color: var(--gold);"></i>
                        <h6 class="fw-bold mb-2">Free Cancellation</h6>
                        <p class="text-muted small mb-0">Plans change. Cancel up to 48 hours before check-in, free.</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                        <i class="bi bi-headset fs-1 mb-3 d-block" style="color: var(--gold);"></i>
                        <h6 class="fw-bold mb-2">24/7 Support</h6>
                        <p class="text-muted small mb-0">Our team is always here to help, day or night.</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="p-4 h-100 bg-white rounded-4 shadow-sm">
                        <i class="bi bi-patch-check-fill fs-1 mb-3 d-block" style="color: var(--gold);"></i>
                        <h6 class="fw-bold mb-2">Instant Confirmation</h6>
                        <p class="text-muted small mb-0">Get your booking confirmed within minutes, not days.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== FAQ ===== --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <p class="text-uppercase fw-semibold small mb-2" style="color: var(--gold); letter-spacing: .2em;">
                    GOT QUESTIONS?
                </p>
                <h2 class="fw-bold" style="font-family: 'Playfair Display', serif; color: var(--navy);">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="accordion" id="bookingFaq">

                        <div class="accordion-item mb-3 border-0 shadow-sm rounded-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What time is check-in and check-out?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#bookingFaq">
                                <div class="accordion-body text-muted">
                                    Check-in starts at 12:00 PM and check-out is by 11:00 AM. Early check-in or late
                                    check-out may be available on request, subject to availability.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm rounded-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Can I cancel or modify my booking?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#bookingFaq">
                                <div class="accordion-body text-muted">
                                    Yes, you can cancel or modify your booking free of charge up to 48 hours before your
                                    check-in date. Please contact our support team to make changes.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm rounded-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Do I need to pay in advance?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#bookingFaq">
                                <div class="accordion-body text-muted">
                                    No advance payment is required to reserve your room. Payment is collected at the resort
                                    during check-in.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item mb-3 border-0 shadow-sm rounded-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Is breakfast included in the room price?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#bookingFaq">
                                <div class="accordion-body text-muted">
                                    Yes, complimentary breakfast is included with all room bookings, served daily from 7:00
                                    AM to 10:30 AM.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm rounded-4 overflow-hidden">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-semibold collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    How will I know my booking is confirmed?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#bookingFaq">
                                <div class="accordion-body text-muted">
                                    You'll receive a confirmation on-screen right after submitting your request, and our
                                    team will follow up via email or phone shortly after.
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // ===== Step A: PHP se aaya blocked-dates data padhna =====
            const fullyBookedData = JSON.parse(
                document.getElementById("fullyBookedData").textContent
            );

            let currentNights = 0;
            let fp = null; // Flatpickr instance yahan store hogi

            // ===== Step B: Booking Summary update karne wala function =====
            function updateSummary() {
                const select = document.getElementById("serviceSelect");
                const selectedOption = select.options[select.selectedIndex];
                const price = selectedOption ? parseFloat(selectedOption.dataset.price || 0) : 0;

                const subtotal = price * currentNights;
                const gst = subtotal * 0.18;
                const total = subtotal + gst;

                document.getElementById("summaryRoomPrice").innerText =
                    "₹" + price.toLocaleString('en-IN');
                document.getElementById("summaryNights").innerText = currentNights;
                document.getElementById("summaryGst").innerText =
                    "₹" + gst.toLocaleString('en-IN', {
                        maximumFractionDigits: 0
                    });
                document.getElementById("summaryTotal").innerText =
                    "₹" + total.toLocaleString('en-IN', {
                        maximumFractionDigits: 0
                    });
            }

            // ===== Step C: Calendar ko (re)banaane wala function =====
            function initCalendar(disabledDates, prefillData) {

                // Agar pehle se calendar bana hua hai, use destroy karo (taaki dubara fresh bane)
                if (fp) {
                    fp.destroy();
                }

                let defaultDates = [];
                if (prefillData && prefillData.checkin && prefillData.checkout) {
                    defaultDates = [prefillData.checkin, prefillData.checkout];
                }

                fp = flatpickr("#calendar", {

                    inline: true,
                    mode: "range",
                    minDate: "today",
                    disable: disabledDates, // <-- yahi wo jagah hai jaha blocked dates disable hoti hain
                    defaultDate: defaultDates,

                    onChange: function(selectedDates) {

                        if (selectedDates.length > 0) {
                            document.getElementById("checkin").innerHTML =
                                flatpickr.formatDate(selectedDates[0], "Y-m-d");
                            document.getElementById("mainCheckIn").value =
                                flatpickr.formatDate(selectedDates[0], "Y-m-d");
                        }

                        if (selectedDates.length == 1) {
                            document.getElementById("checkout").innerHTML = "Not Selected";
                            document.getElementById("mainCheckOut").value = "";
                            document.getElementById("nights").innerHTML = "0";

                            currentNights = 0;
                            updateSummary();

                            const availabilityBox = document.getElementById("availabilityCheck");
                            if (availabilityBox) availabilityBox.style.display = "none";
                        }

                        if (selectedDates.length == 2) {
                            document.getElementById("checkout").innerHTML =
                                flatpickr.formatDate(selectedDates[1], "Y-m-d");
                            document.getElementById("mainCheckOut").value =
                                flatpickr.formatDate(selectedDates[1], "Y-m-d");

                            let nights = Math.ceil(
                                (selectedDates[1] - selectedDates[0]) /
                                (1000 * 60 * 60 * 24)
                            );
                            document.getElementById("nights").innerHTML = nights;

                            currentNights = nights;
                            updateSummary();

                            const availabilityBox = document.getElementById("availabilityCheck");
                            const loadingEl = document.getElementById("availabilityLoading");
                            const resultEl = document.getElementById("availabilityResult");

                            if (availabilityBox) {
                                availabilityBox.style.display = "block";
                                loadingEl.style.display = "flex";
                                resultEl.style.display = "none";

                                setTimeout(function() {
                                    loadingEl.style.display = "none";
                                    resultEl.style.display = "flex";
                                }, 1500);
                            }
                        }
                    }
                });

                // Agar dates pre-filled hain, turant checkin/checkout/nights/summary bhi update kar do
                if (defaultDates.length === 2) {
                    document.getElementById("checkin").innerHTML = defaultDates[0];
                    document.getElementById("checkout").innerHTML = defaultDates[1];
                    document.getElementById("mainCheckIn").value = defaultDates[0];
                    document.getElementById("mainCheckOut").value = defaultDates[1];

                    currentNights = Math.ceil(
                        (new Date(defaultDates[1]) - new Date(defaultDates[0])) / (1000 * 60 * 60 * 24)
                    );
                    document.getElementById("nights").innerHTML = currentNights;
                    updateSummary();
                }
            }

            // ===== Step D: Shuru mein calendar banao, agar Hero se dates aayi hon to pre-filled =====
            initCalendar([], @json($prefill));

            // ===== Step E: Jab Room Type badle, calendar ko naye blocked-dates ke sath refresh karo =====
            document.getElementById("serviceSelect").addEventListener("change", function() {

                const serviceId = this.value;
                const blockedDatesForThisRoom = fullyBookedData[serviceId] || [];

                // Purani selected dates reset kar do (kyunki room badal gaya)
                document.getElementById("checkin").innerHTML = "Not Selected";
                document.getElementById("checkout").innerHTML = "Not Selected";
                document.getElementById("nights").innerHTML = "0";
                document.getElementById("mainCheckIn").value = "";
                document.getElementById("mainCheckOut").value = "";
                currentNights = 0;

                const availabilityBox = document.getElementById("availabilityCheck");
                if (availabilityBox) availabilityBox.style.display = "none";

                // Calendar ko naye room ke blocked-dates ke sath dobara banao (bina prefill ke, kyunki room badla hai)
                initCalendar(blockedDatesForThisRoom);

                updateSummary();
            });

            // ===== Step F: Book Now button (sidebar) =====
            document.getElementById("sidebarBookBtn").addEventListener("click", function() {
                if (fp.selectedDates.length < 2) {
                    alert("Please select both check-in and check-out dates.");
                    return;
                }
                document.getElementById("bookingForm").requestSubmit();
            });

        });
    </script>
@endpush
