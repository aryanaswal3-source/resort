@extends('layout.site-layout')

@section('title', 'Booking Receipt')

@section('content')

    <div class="container py-5">

        {{-- Top Actions --}}
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">

            <a href="{{ route('my.bookings') }}" class="btn btn-outline-secondary rounded-pill px-4">
                ← My Bookings
            </a>

            <a href="{{ route('my.booking.receipt.download') }}" class="btn rounded-pill px-4 text-white"
                style="background:#d89b32;">
                <i class="bi bi-download me-2"></i>
                Download PDF
            </a>

        </div>


        {{-- Receipt --}}
        <div class="receipt bg-white shadow-sm">

            {{-- Header --}}
            <div class="p-4 p-md-5 text-white" style="background:#d89b32;">

                <div class="row align-items-center">

                    {{-- Resort Information --}}
                    <div class="col-md-8 d-flex align-items-center gap-3">

                        <img src="{{ asset('image/logo3.jpg') }}" alt="Sunset Vista Resort" class="rounded-3 bg-white p-1"
                            style="width:70px;height:70px;object-fit:contain;">

                        <div>

                            <h2 class="fw-bold mb-1">
                                Sunset Vista Resort
                            </h2>

                            <p class="mb-0 opacity-75">
                                Luxury Hospitality • Dehradun
                            </p>

                        </div>

                    </div>


                    {{-- Receipt Information --}}
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">

                        <h4 class="fw-bold mb-1">
                            BOOKING RECEIPT
                        </h4>

                        <small>
                            Receipt #{{ str_pad($bookings->first()->id ?? 0, 5, '0', STR_PAD_LEFT) }}
                        </small>

                    </div>

                </div>

            </div>


            {{-- Main Receipt Content --}}
            <div class="p-4 p-md-5">

                @php

                    $firstBooking = $bookings->first();

                    /*
                |--------------------------------------------------------------------------
                | Booking Amount Calculation
                |--------------------------------------------------------------------------
                */

                    $subtotalTotal = 0;
                    $gstTotal = 0;
                    $grandTotal = 0;

                    $cancelledSubtotal = 0;
                    $cancelledGst = 0;
                    $cancelledTotal = 0;

                    foreach ($bookings as $booking) {
                        $nights = $booking->check_in_date->diffInDays($booking->check_out_date);

                        $subtotal = $booking->price * $nights;
                        $gst = $booking->gst_amount;
                        $total = $booking->total_amount;

                        /*
                    |--------------------------------------------------------------------------
                    | Cancelled Booking
                    |--------------------------------------------------------------------------
                    */

                        if ($booking->status === 'cancelled') {
                            $cancelledSubtotal += $subtotal;
                            $cancelledGst += $gst;
                            $cancelledTotal += $total;
                        } else {
                            /*
                        |--------------------------------------------------------------------------
                        | Active Booking
                        |--------------------------------------------------------------------------
                        */

                            $subtotalTotal += $subtotal;
                            $gstTotal += $gst;
                            $grandTotal += $total;
                        }
                    }

                    /*
                |--------------------------------------------------------------------------
                | Stay Information
                |--------------------------------------------------------------------------
                */

                    $totalAdults = $bookings->where('status', '!=', 'cancelled')->sum('adults');

                    $totalChildren = $bookings->where('status', '!=', 'cancelled')->sum('children');

                    $totalNights = 0;

                    foreach ($bookings as $booking) {
                        if ($booking->status !== 'cancelled') {
                            $totalNights += $booking->check_in_date->diffInDays($booking->check_out_date);
                        }
                    }

                    /*
                |--------------------------------------------------------------------------
                | Booking Status Counts
                |--------------------------------------------------------------------------
                */

                    $confirmedCount = $bookings->where('status', 'confirmed')->count();

                    $pendingCount = $bookings->where('status', 'pending')->count();

                    $cancelledCount = $bookings->where('status', 'cancelled')->count();

                @endphp


                {{-- Customer Information --}}
                <div class="row mb-4">

                    <div class="col-md-7">

                        <small class="text-muted">
                            Guest
                        </small>

                        <h5 class="fw-bold mb-1">
                            {{ $firstBooking->name ?? 'Guest' }}
                        </h5>

                        <div class="text-muted">
                            {{ $firstBooking->email ?? '' }}
                        </div>

                        <div class="text-muted">
                            {{ $firstBooking->phone ?? '' }}
                        </div>

                    </div>


                    <div class="col-md-5 text-md-end mt-3 mt-md-0">

                        <small class="text-muted d-block">
                            Booking Date
                        </small>

                        <strong>
                            {{ $firstBooking?->created_at?->format('d M Y') }}
                        </strong>


                        <small class="text-muted d-block mt-2">
                            Total Bookings
                        </small>

                        <strong>
                            {{ $totalBookings }}
                        </strong>

                    </div>

                </div>


                {{-- Booking Summary --}}
                <h6 class="fw-bold text-uppercase mb-3" style="color:#8b6b3f;">
                    Booking Summary
                </h6>


                <div class="table-responsive">

                    <table class="table table-bordered align-middle mb-4">

                        <thead class="table-light">

                            <tr>

                                <th>#</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Guests</th>
                                <th>Nights</th>
                                <th>Status</th>
                                <th class="text-end">Amount</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($bookings as $booking)
                                @php

                                    $nights = $booking->check_in_date->diffInDays($booking->check_out_date);

                                    $subtotal = $booking->price * $nights;

                                @endphp


                                <tr>

                                    {{-- Number --}}
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- Room --}}
                                    <td>

                                        <strong>
                                            {{ $booking->service->title ?? 'Room Booking' }}
                                        </strong>

                                        <small class="d-block text-muted">
                                            Booking #{{ $booking->id }}
                                        </small>

                                    </td>


                                    {{-- Check-in --}}
                                    <td>
                                        {{ $booking->check_in_date->format('d M Y') }}
                                    </td>


                                    {{-- Check-out --}}
                                    <td>
                                        {{ $booking->check_out_date->format('d M Y') }}
                                    </td>


                                    {{-- Guests --}}
                                    <td>

                                        {{ $booking->adults }} Adults

                                        @if ($booking->children)
                                            <small class="d-block text-muted">
                                                {{ $booking->children }} Children
                                            </small>
                                        @endif

                                    </td>


                                    {{-- Nights --}}
                                    <td>
                                        {{ $nights }}
                                    </td>


                                    {{-- Individual Status --}}
                                    <td>

                                        @if ($booking->status === 'confirmed')
                                            <span class="badge bg-success rounded-pill px-3 py-2">

                                                <i class="bi bi-check-circle me-1"></i>

                                                Confirmed

                                            </span>
                                        @elseif ($booking->status === 'cancelled')
                                            <span class="badge bg-danger rounded-pill px-3 py-2">

                                                <i class="bi bi-x-circle me-1"></i>

                                                Cancelled

                                            </span>
                                        @else
                                            <span
                                                class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">

                                                <i class="bi bi-clock-history me-1"></i>

                                                Pending

                                            </span>
                                        @endif

                                    </td>


                                    {{-- Amount --}}
                                    <td class="text-end fw-semibold">

                                        @if ($booking->status === 'cancelled')
                                            <span class="text-decoration-line-through text-muted">

                                                ₹{{ number_format($subtotal, 2) }}

                                            </span>

                                            <small class="d-block text-danger">
                                                Cancelled
                                            </small>
                                        @else
                                            ₹{{ number_format($subtotal, 2) }}
                                        @endif

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- Payment Status --}}
                <div class="text-end mb-4">

                    <small class="text-muted d-block mb-1">
                        Payment Status
                    </small>

                    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-3 py-2">

                        <i class="bi bi-clock-history me-1"></i>

                        Payment Pending

                    </span>

                </div>


                {{-- Stay Information + Payment Summary --}}
                <div class="row g-5 align-items-start mt-4">


                    {{-- Stay Information --}}
                    <div class="col-md-6">

                        <h6 class="fw-bold text-uppercase mb-3" style="color:#8b6b3f;">
                            Stay Information
                        </h6>


                        <div class="bg-light rounded-3 p-4">


                            {{-- Rooms Booked --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="text-muted">

                                    <i class="bi bi-door-open me-2"></i>

                                    Active Rooms

                                </span>

                                <strong>
                                    {{ $totalBookings - $cancelledCount }}
                                </strong>

                            </div>


                            {{-- Total Guests --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="text-muted">

                                    <i class="bi bi-people me-2"></i>

                                    Total Guests

                                </span>

                                <strong class="text-end">

                                    {{ $totalAdults }} Adults

                                    @if ($totalChildren > 0)
                                        <span class="text-muted fw-normal">

                                            • {{ $totalChildren }}
                                            Child{{ $totalChildren > 1 ? 'ren' : '' }}

                                        </span>
                                    @endif

                                </strong>

                            </div>


                            {{-- Room Nights --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="text-muted">

                                    <i class="bi bi-moon-stars me-2"></i>

                                    Room Nights

                                </span>

                                <strong>
                                    {{ $totalNights }}
                                </strong>

                            </div>


                            {{-- Booking Status --}}
                            <div class="d-flex justify-content-between align-items-start">

                                <span class="text-muted">

                                    <i class="bi bi-clipboard-check me-2"></i>

                                    Booking Status

                                </span>


                                <div class="text-end">

                                    @if ($confirmedCount > 0)
                                        <div class="mb-1">

                                            <span class="badge bg-success rounded-pill px-2 py-1">

                                                {{ $confirmedCount }}
                                                Confirmed

                                            </span>

                                        </div>
                                    @endif


                                    @if ($pendingCount > 0)
                                        <div class="mb-1">

                                            <span
                                                class="badge bg-warning-subtle text-warning-emphasis rounded-pill px-2 py-1">

                                                {{ $pendingCount }}
                                                Pending

                                            </span>

                                        </div>
                                    @endif


                                    @if ($cancelledCount > 0)
                                        <div>

                                            <span class="badge bg-danger rounded-pill px-2 py-1">

                                                {{ $cancelledCount }}
                                                Cancelled

                                            </span>

                                        </div>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Payment Summary --}}
                    <div class="col-md-6 col-lg-5 ms-md-auto">

                        <h6 class="fw-bold text-uppercase mb-3" style="color:#8b6b3f;">

                            Payment Summary

                        </h6>


                        {{-- Active Room Charges --}}
                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Room Charges
                            </span>

                            <strong>
                                ₹{{ number_format($subtotalTotal, 2) }}
                            </strong>

                        </div>


                        {{-- GST --}}
                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                GST (18%)
                            </span>

                            <strong>
                                ₹{{ number_format($gstTotal, 2) }}
                            </strong>

                        </div>


                        {{-- Cancelled Deduction --}}
                        @if ($cancelledCount > 0)
                            <div class="d-flex justify-content-between align-items-start mb-3 text-danger">

                                <span>

                                    <i class="bi bi-dash-circle me-1"></i>

                                    Cancelled Booking Deduction

                                    <small class="d-block text-muted">
                                        {{ $cancelledCount }} booking{{ $cancelledCount > 1 ? 's' : '' }} cancelled
                                    </small>

                                </span>

                                <strong>
                                    - ₹{{ number_format($cancelledTotal, 2) }}
                                </strong>

                            </div>
                        @endif


                        <hr>


                        {{-- Grand Total --}}
                        <div class="d-flex justify-content-between align-items-center rounded-3 p-3"
                            style="background:#f6f3ee;">

                            <strong>
                                Grand Total
                            </strong>

                            <strong class="fs-4" style="color:#8b6b3f;">

                                ₹{{ number_format($grandTotal, 2) }}

                            </strong>

                        </div>


                        {{-- Cancelled Information --}}
                        @if ($cancelledCount > 0)
                            <small class="text-muted d-block mt-2 text-end">

                                <i class="bi bi-info-circle me-1"></i>

                                Cancelled booking amount has been deducted.

                            </small>
                        @endif

                    </div>

                </div>


                {{-- Special Requests --}}
                @php

                    $messages = $bookings->whereNotNull('message')->where('message', '!=', '');

                @endphp


                @if ($messages->count())

                    <h6 class="fw-bold text-uppercase mt-5 mb-3" style="color:#8b6b3f;">

                        Special Requests

                    </h6>


                    @foreach ($messages as $booking)
                        <div class="bg-light rounded-3 p-3 mb-2">

                            <strong>
                                Booking #{{ $booking->id }}
                            </strong>

                            <span class="text-muted">
                                — {{ $booking->message }}
                            </span>

                        </div>
                    @endforeach

                @endif


                {{-- Footer --}}
                <div class="text-center border-top mt-5 pt-4">

                    <h6 class="fw-bold mb-1">
                        Thank you for choosing Sunset Vista Resort
                    </h6>

                    <p class="text-muted mb-1">
                        We look forward to welcoming you.
                    </p>

                    <small class="text-muted">
                        This is a computer-generated booking receipt and does not require a signature.
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- Minimal Custom CSS --}}
    <style>
        .receipt {
            max-width: 1100px;
            margin: auto;
            border: 1px solid #e5e5e5;
            border-radius: 18px;
            overflow: hidden;
        }

        @media print {

            body {
                background: #fff !important;
            }

            .no-print,
            nav,
            header,
            footer {
                display: none !important;
            }

            .container {
                max-width: 100% !important;
                padding: 0 !important;
            }

            .receipt {
                max-width: 100%;
                border: 0;
                box-shadow: none !important;
                border-radius: 0;
            }

            @page {
                size: A4;
                margin: 12mm;
            }

        }
    </style>

@endsection
