@extends('layout.site-layout')

@section('title', 'My Bookings')

@section('content')

    <div class="container py-5">

        <div class="mb-4">
            <h2 class="fw-bold">My Bookings</h2>
            <p class="text-muted mb-0">
                View and manage all your resort bookings.
            </p>
        </div>

        @if ($bookings->count() > 0)

            <div class="row g-4">

                @foreach ($bookings as $booking)
                    <div class="col-12">

                        <div class="card border-0 shadow-sm rounded-4">

                            <div class="card-body p-4">

                                <div class="row align-items-center">

                                    {{-- Booking Info --}}
                                    <div class="col-lg-4 mb-3 mb-lg-0">

                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <h5 class="fw-bold mb-0">
                                                {{ $booking->service->name ?? 'Room Booking' }}
                                            </h5>

                                            @if ($booking->status === 'confirmed')
                                                <span class="badge bg-success">
                                                    Confirmed
                                                </span>
                                            @elseif($booking->status === 'cancelled')
                                                <span class="badge bg-danger">
                                                    Cancelled
                                                </span>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    Pending
                                                </span>
                                            @endif
                                        </div>

                                        <p class="text-muted mb-1">
                                            Booking ID: #{{ $booking->id }}
                                        </p>

                                        <p class="text-muted mb-0">
                                            Booked on:
                                            {{ $booking->created_at->format('d M Y') }}
                                        </p>

                                    </div>


                                    {{-- Dates --}}
                                    <div class="col-lg-3 mb-3 mb-lg-0">

                                        <small class="text-muted d-block">
                                            Check-in
                                        </small>

                                        <strong>
                                            {{ $booking->check_in_date->format('d M Y') }}
                                        </strong>

                                        <span class="mx-2">→</span>

                                        <small class="text-muted d-block mt-2">
                                            Check-out
                                        </small>

                                        <strong>
                                            {{ $booking->check_out_date->format('d M Y') }}
                                        </strong>

                                    </div>


                                    {{-- Guests --}}
                                    <div class="col-lg-2 mb-3 mb-lg-0">

                                        <small class="text-muted d-block">
                                            Guests
                                        </small>

                                        <strong>
                                            {{ $booking->adults }} Adults
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            {{ $booking->children }} Children
                                        </small>

                                    </div>


                                    {{-- Amount --}}
                                    <div class="col-lg-3 text-lg-end">

                                        <small class="text-muted d-block">
                                            Total Amount
                                        </small>

                                        <h4 class="fw-bold mb-3">
                                            ₹{{ number_format($booking->total_amount, 2) }}
                                        </h4>

                                        <a href="{{ route('my.booking.show', $booking->id) }}"
                                            class="btn btn-outline-dark btn-sm rounded-pill px-3">
                                            View Details
                                        </a>

                                        <a href="{{ route('my.booking.receipt') }}" class="btn btn-dark rounded-pill px-4">
                                            View Receipt
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div class="card border-0 shadow-sm rounded-4 text-center p-5">

                <div class="mb-3">
                    <i class="bi bi-calendar-x fs-1 text-muted"></i>
                </div>

                <h4 class="fw-bold">
                    No Bookings Yet
                </h4>

                <p class="text-muted">
                    You haven't made any bookings yet.
                </p>

                <div>
                    <a href="{{ route('booking.create') }}" class="btn btn-dark rounded-pill px-4">
                        Book a Room
                    </a>
                </div>

            </div>

        @endif

    </div>

@endsection
