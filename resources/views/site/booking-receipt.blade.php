@extends('layout.site-layout')

@section('title', 'Booking Receipt')

@section('content')

<div class="container py-5">

@foreach ($bookings as $booking)

@php
    $nights = $booking->check_in_date->diffInDays($booking->check_out_date);
    $subtotal = $booking->price * $nights;
@endphp

<div class="mx-auto" style="max-width:900px">

    {{-- RECEIPT --}}
    <div class="card border-0 shadow rounded-4 overflow-hidden">

        {{-- HEADER --}}
        <div class="p-4 p-md-5 text-white"
             style="background:linear-gradient(135deg,#c88a24,#8f5d0b)">

            <div class="row align-items-center">

                <div class="col-md-7">

                    <div class="d-flex align-items-center gap-3">

                        <div class="bg-white rounded-3 p-3 fs-3">
                            🏨
                        </div>

                        <div>
                            <h2 class="fw-bold mb-1">
                                Sunset Vista Resort
                            </h2>

                            <div class="opacity-75">
                                Luxury Hospitality • Dehradun
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-5 text-md-end mt-4 mt-md-0">

                    <small class="opacity-75">
                        OFFICIAL BOOKING RECEIPT
                    </small>

                    <h3 class="fw-bold mb-1">
                        #{{ $booking->id }}
                    </h3>

                    <small>
                        {{ $booking->created_at->format('d M Y') }}
                    </small>

                </div>

            </div>

        </div>


        {{-- STATUS --}}
        <div class="px-4 px-md-5 py-3 bg-light
                    d-flex justify-content-between align-items-center">

            <span class="text-muted">
                Reservation Status
            </span>

            <span class="badge rounded-pill px-3 py-2
                {{ $booking->status == 'confirmed'
                    ? 'bg-success'
                    : ($booking->status == 'cancelled'
                        ? 'bg-danger'
                        : 'bg-warning text-dark') }}">

                {{ ucfirst($booking->status) }}

            </span>

        </div>


        <div class="card-body p-4 p-md-5">


            {{-- GUEST --}}
            <div class="mb-5">

                <h5 class="fw-bold mb-3">
                    Guest Information
                </h5>

                <div class="row g-3">

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block">
                                Guest Name
                            </small>
                            <strong>{{ $booking->name }}</strong>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block">
                                Email
                            </small>
                            <strong class="text-break">
                                {{ $booking->email }}
                            </strong>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <small class="text-muted d-block">
                                Phone
                            </small>
                            <strong>{{ $booking->phone }}</strong>
                        </div>
                    </div>

                </div>

            </div>


            {{-- STAY --}}
            <div class="mb-5">

                <h5 class="fw-bold mb-3">
                    Stay Details
                </h5>

                <div class="table-responsive border rounded-3">

                    <table class="table mb-0 align-middle">

                        <thead style="background:#fff8eb">

                            <tr>
                                <th class="px-3 py-3">Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Guests</th>
                                <th>Nights</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td class="px-3 fw-semibold">
                                    {{ $booking->service->title ?? 'Room Booking' }}
                                </td>

                                <td>
                                    {{ $booking->check_in_date->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $booking->check_out_date->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $booking->adults }} Adults

                                    @if($booking->children)
                                        <br>
                                        <small class="text-muted">
                                            {{ $booking->children }} Children
                                        </small>
                                    @endif
                                </td>

                                <td class="fw-semibold">
                                    {{ $nights }}
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- PAYMENT --}}
            <div class="row justify-content-end">

                <div class="col-md-6 col-lg-5">

                    <div class="border rounded-4 p-4"
                         style="background:#fffaf1">

                        <h5 class="fw-bold mb-4">
                            Payment Summary
                        </h5>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                Room Price
                            </span>

                            <span>
                                ₹{{ number_format($booking->price, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                {{ $nights }} Night(s)
                            </span>

                            <span>
                                ₹{{ number_format($subtotal, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                GST (18%)
                            </span>

                            <span>
                                ₹{{ number_format($booking->gst_amount, 2) }}
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">

                            <span class="fw-bold fs-5">
                                Grand Total
                            </span>

                            <span class="fw-bold fs-3"
                                  style="color:#b87912">
                                ₹{{ number_format($booking->total_amount, 2) }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- SPECIAL REQUEST --}}
            @if($booking->message)

                <div class="mt-5">

                    <h5 class="fw-bold mb-3">
                        Special Request
                    </h5>

                    <div class="alert mb-0 border-0 rounded-3"
                         style="background:#fff8eb">

                        {{ $booking->message }}

                    </div>

                </div>

            @endif


        </div>


        {{-- FOOTER --}}
        <div class="text-center border-top p-4">

            <h6 class="fw-bold mb-1">
                Thank you for choosing
                <span style="color:#b87912">
                    Sunset Vista Resort
                </span>
            </h6>

            <small class="text-muted">
                Park Estate, Hathi Paon George Everest House,
                Mussoorie 248179, India
            </small>

            <div class="mt-2">
                <small class="text-muted">
                    Computer-generated booking receipt
                </small>
            </div>

        </div>

    </div>

</div>

@endforeach


{{-- BUTTONS --}}
<div class="text-center mt-4">

    <button onclick="window.print()"
            class="btn btn-dark rounded-pill px-4 me-2">
        🖨 Print / Save PDF
    </button>

    <a href="{{ route('my.bookings') }}"
       class="btn btn-outline-dark rounded-pill px-4">
        ← My Bookings
    </a>

</div>

</div>


{{-- PRINT --}}
<style>
@media print {

    body {
        background: #fff !important;
    }

    .navbar,
    header,
    footer,
    .btn {
        display: none !important;
    }

    .card {
        box-shadow: none !important;
    }

    .container {
        max-width: 100% !important;
    }

    @page {
        size: A4;
        margin: 10mm;
    }
}
</style>

@endsection