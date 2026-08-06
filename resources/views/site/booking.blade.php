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

    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Left Side Booking Form -->
                <div class="col-lg-8">

                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body p-4">

                            <h3 class="mb-4 fw-bold">Booking Details</h3>

                            <form action="{{ route('booking.store') }}" method="POST" id="bookingForm">
                                @csrf

                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Full Name" required>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                            required>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Enter Phone Number" required>
                                    </div>

                                    <!-- Room Type -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Room Type</label>
                                        <select name="room_type" class="form-select" required>
                                            <option value="">Select Room</option>
                                            <option value="Deluxe">Deluxe</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Classic">Classic</option>
                                            <option value="Budget">Budget</option>
                                        </select>
                                    </div>

                                    <!-- Check In -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Check In Date</label>
                                        <input type="date" name="check_in_date" id="mainCheckIn" class="form-control" required>
                                    </div>

                                    <!-- Check Out -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Check Out Date</label>
                                        <input type="date" name="check_out_date" id="mainCheckOut" class="form-control" required>
                                    </div>

                                    <!-- Adults -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" name="adults" class="form-control" min="1"
                                            value="1">
                                    </div>

                                    <!-- Children -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Children</label>
                                        <input type="number" name="children" class="form-control" min="0"
                                            value="0">
                                    </div>

                                    <!-- Message -->
                                    <div class="col-12 mb-4">
                                        <label class="form-label">Special Request</label>
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
                                <strong>₹2000</strong>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span>Nights</span>
                                <strong>2</strong>
                            </div>

                            <div class="d-flex justify-content-between mb-3">
                                <span>GST (18%)</span>
                                <strong>₹720</strong>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between">

                                <h5>Total</h5>

                                <h5 class="text-success">
                                    ₹4720
                                </h5>

                            </div>

                        </div>

                    </div>

                    <!-- Calendar -->
                    <div class="card shadow border-0 rounded-4 mb-4">

                        <div class="card-body">

                            <h4 class="fw-bold mb-3">
                                Select Dates
                            </h4>

                           <input type="text" id="calendar" hidden>

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

                    <button type="button" id="sidebarBookBtn" class="btn btn-success w-100 py-3 rounded-pill fw-bold">
                        Book Now
                    </button>

                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener("DOMContentLoaded",function(){

flatpickr("#calendar",{

inline:true,
mode:"range",
minDate:"today",

onChange:function(selectedDates){

if(selectedDates.length>0){

document.getElementById("checkin").innerHTML=
flatpickr.formatDate(selectedDates[0],"Y-m-d");

document.getElementById("mainCheckIn").value=
flatpickr.formatDate(selectedDates[0],"Y-m-d");

}

if(selectedDates.length==2){

document.getElementById("checkout").innerHTML=
flatpickr.formatDate(selectedDates[1],"Y-m-d");

document.getElementById("mainCheckOut").value=
flatpickr.formatDate(selectedDates[1],"Y-m-d");

let nights=Math.ceil(
(selectedDates[1]-selectedDates[0])/
(1000*60*60*24)
);

document.getElementById("nights").innerHTML=nights;

}

}

});

});
</script>
@endpush