@extends('layout.site-layout')

@section('title', 'Booking Details')

@section('content')

    <div class="container py-5">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Booking Details</h2>
                <p class="text-muted mb-0">
                    Complete information about your reservation.
                </p>
            </div>

            <a href="{{ route('my.bookings') }}" class="btn btn-outline-warning rounded-pill px-4">
                ← My Bookings
            </a>
        </div>

        {{-- Main Card --}}
        <div class="card border-0 shadow rounded-4 overflow-hidden">

            {{-- Booking Header --}}
            <div class="card-header text-white p-4" style="background:linear-gradient(135deg,#d89b32,#b87912);">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <small class="opacity-75">Booking ID</small>
                        <h3 class="fw-bold mb-0">#{{ $booking->id }}</h3>
                    </div>

                    <span
                        class="badge rounded-pill px-3 py-2
                    {{ $booking->status == 'confirmed'
                        ? 'bg-success'
                        : ($booking->status == 'cancelled'
                            ? 'bg-danger'
                            : 'bg-warning text-dark') }}">
                        <small class="opacity-75">Status</small>
                        {{ ucfirst($booking->status) }}
                    </span>

                </div>
            </div>

            <div class="card-body p-4 p-lg-5">

                {{-- Guest --}}
                <h5 class="fw-bold mb-3" style="color:#b87912;">
                    Guest Information
                </h5>

                <div class="row g-4 mb-4">

                    <div class="col-md-4">
                        <small class="text-muted">Guest Name</small>
                        <div class="fw-semibold">{{ $booking->name }}</div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Email</small>
                        <div class="fw-semibold">{{ $booking->email }}</div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Phone</small>
                        <div class="fw-semibold">{{ $booking->phone }}</div>
                    </div>

                </div>

                <hr>

                {{-- Room --}}
                <h5 class="fw-bold my-4" style="color:#b87912;">
                    Room Information
                </h5>

                <div class="row g-4 mb-4">

                    <div class="col-md-4">
                        <small class="text-muted">Room</small>
                        <div class="fw-semibold">
                            {{ $booking->service->title ?? 'Room Booking' }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Check-in</small>
                        <div class="fw-semibold">
                            {{ $booking->check_in_date->format('d M Y') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Check-out</small>
                        <div class="fw-semibold">
                            {{ $booking->check_out_date->format('d M Y') }}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Adults</small>
                        <div class="fw-semibold">{{ $booking->adults }}</div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Children</small>
                        <div class="fw-semibold">{{ $booking->children }}</div>
                    </div>

                    <div class="col-md-4">
                        <small class="text-muted">Nights</small>
                        <div class="fw-semibold">
                            {{ $booking->check_in_date->diffInDays($booking->check_out_date) }}
                        </div>
                    </div>

                </div>

                <hr>

                {{-- Price --}}
                @php
                    $nights = $booking->check_in_date->diffInDays($booking->check_out_date);
                    $subtotal = $booking->price * $nights;
                @endphp

                <h5 class="fw-bold my-4" style="color:#b87912;">
                    Price Details
                </h5>

                <div class="row justify-content-end">
                    <div class="col-md-6 col-lg-5">

                        <div class="d-flex justify-content-between mb-2">
                            <span>Room Price</span>
                            <span>₹{{ number_format($booking->price, 2) }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Nights</span>
                            <span>× {{ $nights }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <strong>₹{{ number_format($subtotal, 2) }}</strong>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span>GST (18%)</span>
                            <span>₹{{ number_format($booking->gst_amount, 2) }}</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center
                                rounded-3 p-3"
                            style="background:#fff7e6;">

                            <strong class="fs-5">Grand Total</strong>

                            <strong class="fs-4" style="color:#b87912;">
                                ₹{{ number_format($booking->total_amount, 2) }}
                            </strong>

                        </div>

                    </div>
                </div>

                {{-- Message --}}
                @if ($booking->message)
                    <hr class="my-4">

                    <h5 class="fw-bold mb-2" style="color:#b87912;">
                        Special Request
                    </h5>

                    <div class="bg-light rounded-3 p-3 text-muted">
                        {{ $booking->message }}
                    </div>
                @endif

                {{-- Buttons --}}
                <div class="d-flex justify-content-end gap-2 mt-5">

                    <a href="{{ route('my.bookings') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        Back
                    </a>

                    <a href="{{ route('my.booking.receipt', $booking->id) }}" class="btn text-white rounded-pill px-4"
                        style="background:#d89b32;">
                        View Receipt
                    </a>

                </div>

            </div>
        </div>
    </div>

@endsection
