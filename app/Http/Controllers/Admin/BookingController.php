<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Booking status updated.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking deleted.');
    }
}