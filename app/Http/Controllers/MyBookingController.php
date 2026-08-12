<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;

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

        $totalBookings = $bookings->count();
        $totalAmount = $bookings->sum('total_amount');
        $confirmedAmount = $bookings->where('status', 'confirmed')->sum('total_amount');

        return view('site.booking-receipt', compact(
            'bookings',
            'totalBookings',
            'totalAmount',
            'confirmedAmount'
        ));
    }

    public function downloadReceipt()
    {
        $bookings = Booking::with('service')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        abort_if($bookings->isEmpty(), 404);

        $totalBookings = $bookings->count();

        $pdf = Pdf::loadView(
            'site.booking-receipt-pdf',
            compact('bookings', 'totalBookings')
        );

        return $pdf->download('Sunset-Vista-Resort-Receipt.pdf');
    }
}
