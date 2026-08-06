<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('site.booking');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'room_type' => 'required|in:Deluxe,Premium,Classic,Budget',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'message' => 'nullable|string',
        ]);

        $data['status'] = 'pending';

        Booking::create($data);

        return back()->with('success', 'Your booking request has been received! We will contact you soon.');
    }
}