@extends('layout.site-layout')

@section('title', 'Check Room Availability')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/query.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@section('content')

    <section class="booking-section">

        <div class="container">

            {{-- Hero --}}
            <div class="booking-banner">

                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                    ⭐ Luxury Resort
                </span>

                <h1 class="mt-3">
                    Check Room Availability
                </h1>

                <p>
                    Plan your perfect getaway with Sunset Vista Resort.
                    Fill the enquiry form below and our reservation team will
                    contact you with the best available rates.
                </p>

            </div>

            {{-- Success --}}
            @if (session('success'))
                <div class="alert alert-success shadow-sm rounded-4">

                    {{ session('success') }}

                </div>
            @endif

            {{-- Errors --}}
            @if ($errors->any())

                <div class="alert alert-danger rounded-4">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('query.store') }}" method="POST">

                @csrf

                <div class="booking-card">

                    {{-- Stay Details --}}

                    <div class="section-title">

                        <i class="fa-solid fa-bed"></i>

                        <span>Stay Details</span>

                    </div>

                    <div class="row g-4">

                        {{-- Room Type --}}

                        <div class="col-lg-6">

                            <label class="form-label">Room Type  </label>

                            <select name="room_type" class="form-select" required>
                                <option value=""> Select Room Type </option>

                                <option value="Budget Room"> Budget Room </option>

                                <option value="Classic Room"> Classic Room </option>

                                <option value="Double Room"> Double Room </option>

                                <option value="Luxury Room"> Luxury Room </option>

                                <option value="Suite Room"> Suite Room </option>

                            </select>

                        </div>

                        {{-- Date Range --}}

                        <div class="col-lg-6">

                            <label class="form-label"> Stay Dates </label>

                            <input type="text" id="dateRange" class="form-control"
                                placeholder="Select Check-in & Check-out" readonly>

                            <input type="hidden" name="check_in" id="check_in">

                            <input type="hidden" name="check_out" id="check_out">

                        </div>

                        {{-- Rooms --}}

                        <div class="col-md-4">
                            <label class="form-label"> Rooms </label>
                            <input type="number" class="form-control" name="rooms" value="1" min="1"
                                required>

                        </div>

                        {{-- Adults --}}

                        <div class="col-md-4">

                            <label class="form-label"> Adults</label>

                            <input type="number" class="form-control" name="adults" value="2" min="1"
                                required>

                        </div>

                        {{-- Children --}}

                        <div class="col-md-4">

                            <label class="form-label">Children</label>

                            <input type="number" class="form-control" name="children" value="0" min="0">

                        </div>

                    </div>

                    <hr class="my-5">

                    {{-- ============================ Guest Information============================== --}}

                    <div class="section-title">
                        <i class="fa-solid fa-user"></i>
                        <span>Guest Information</span>
                    </div>

                    <div class="row g-4">

                        {{-- Full Name --}}
                        <div class="col-md-6">
                            <label class="form-label"> Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i> </span>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name"
                                    value="{{ old('name') }}" required>
                            </div>

                        </div>

                        {{-- Mobile --}}
                        <div class="col-md-6">

                            <label class="form-label"> Mobile Number</label>

                            <div class="input-group">

                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>

                                <input type="text" name="mobile" class="form-control" placeholder="+91 9876543210"
                                    value="{{ old('mobile') }}" required>

                            </div>

                        </div>

                        {{-- Email --}}
                        <div class="col-md-6">

                            <label class="form-label"> Email Address
                            </label>

                            <div class="input-group">

                                <span class="input-group-text"> <i class="fa-solid fa-envelope"></i>
                                </span>

                                <input type="email" name="email" class="form-control" placeholder="example@gmail.com"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        {{-- Message --}}
                        <div class="col-md-6">
                            <label class="form-label"> Special Request </label>
                            <textarea name="message" rows="5" class="form-control" placeholder="Write your special request...">{{ old('message') }}</textarea>
                        </div>

                    </div>

                    {{-- ================================Booking Summary============================== --}}

                    <div class="booking-summary mt-5">

                        <h4><i class="fa-solid fa-calendar-check text-success me-2"></i>Booking Summary </h4>

                        <div class="summary-item">
                            <span>Check-in</span>
                            <strong id="showCheckIn">-- </strong>
                        </div>

                        <div class="summary-item">
                            <span>Check-out</span> <strong id="showCheckOut"> -- </strong>
                        </div>

                        <div class="summary-item">
                            <span> Total Nights </span><strong id="totalNights"> 0 Night(s) </strong>
                        </div>
                    </div>

                    {{-- Submit Button --}}

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-book">
                            <i class="fa-solid fa-paper-plane me-2"></i> Sumbit Query
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#dateRange", {

            mode: "range",

            minDate: "today",

            dateFormat: "Y-m-d",

            onClose: function(selectedDates) {

                if (selectedDates.length === 2) {

                    let checkIn = selectedDates[0];

                    let checkOut = selectedDates[1];

                    document.getElementById("check_in").value =
                        flatpickr.formatDate(checkIn, "Y-m-d");

                    document.getElementById("check_out").value =
                        flatpickr.formatDate(checkOut, "Y-m-d");

                    document.getElementById("showCheckIn").innerHTML =
                        flatpickr.formatDate(checkIn, "d M Y");

                    document.getElementById("showCheckOut").innerHTML =
                        flatpickr.formatDate(checkOut, "d M Y");

                    let nights = Math.ceil(
                        (checkOut - checkIn) / (1000 * 60 * 60 * 24)
                    );

                    document.getElementById("totalNights").innerHTML =
                        nights + " Night(s)";

                }

            }

        });
    </script>
@endpush
