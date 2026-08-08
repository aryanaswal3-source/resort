<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        $services = Service::all();

        $fullyBookedDates = [];

        foreach ($services as $service) {

            $bookings = Booking::where('service_id', $service->id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->get();

            $dateCounts = [];

            foreach ($bookings as $booking) {

                $period = CarbonPeriod::create(
                    $booking->check_in_date,
                    Carbon::parse($booking->check_out_date)->subDay()
                );

                foreach ($period as $date) {
                    $dateString = $date->format('Y-m-d');
                    $dateCounts[$dateString] = ($dateCounts[$dateString] ?? 0) + 1;
                }
            }

            $blockedDates = [];
            foreach ($dateCounts as $date => $count) {
                if ($count >= $service->total_rooms) {
                    $blockedDates[] = $date;
                }
            }

            $fullyBookedDates[$service->id] = $blockedDates;
        }

        return view('site.booking', compact('services', 'fullyBookedDates'));
    }

    public function store(Request $request)
    {
        $existingBooking = Booking::where('user_id', auth()->id())
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($existingBooking) {
            return back()->with('error', 'You already have an active booking. Please wait for it to be completed or cancelled before booking again.');
        }

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

        $nights = Carbon::parse($data['check_in_date'])
            ->diffInDays(Carbon::parse($data['check_out_date']));

        $subtotal = $service->price * $nights;
        $gst = $subtotal * 0.18;
        $total = $subtotal + $gst;

        $data['user_id'] = auth()->id();
        $data['price'] = $service->price;
        $data['gst_amount'] = $gst;
        $data['total_amount'] = $total;
        $data['status'] = 'pending';

        Booking::create($data);

        return back()->with('success', 'Your booking request has been received! We will contact you soon.');
    }
}
