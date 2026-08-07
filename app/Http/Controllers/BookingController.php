<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('site.booking', compact('services'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'service_id' => 'required|exists:services,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'message' => 'nullable|string',
        ]);

        $service = Service::findOrFail($data['service_id']);

        $nights = \Carbon\Carbon::parse($data['check_in_date'])
            ->diffInDays(\Carbon\Carbon::parse($data['check_out_date']));

        $subtotal = $service->price * $nights;
        $gst = $subtotal * 0.18;
        $total = $subtotal + $gst;

        $data['price'] = $service->price;
        $data['gst_amount'] = $gst;
        $data['total_amount'] = $total;
        $data['status'] = 'pending';

        Booking::create($data);

        return back()->with('success', 'Your booking request has been received! We will contact you soon.');
    }
}