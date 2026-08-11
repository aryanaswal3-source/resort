<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class MyBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('service')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('site.my-bookings', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with('service')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('site.booking-details', compact('booking'));
    }

    public function receipt()
    {
        $bookings = Booking::with('service')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('site.booking-receipt', compact('bookings'));
    }
}
