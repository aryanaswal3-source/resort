<?php

namespace App\Http\Controllers;

use App\Models\TravelQuery;
use Illuminate\Http\Request;

class TravelQueryController extends Controller
{
    // Show the public query form (site side)
    public function create()
    {
        return view('site.query-form');
    }

    // Handle form submission from the public site
    public function store(Request $request)
    {
        $data = $request->validate([
            'room_type'  => 'required|string|max:100',
            'check_in'   => 'required|date',
            'check_out'  => 'required|date|after:check_in',
            'rooms'      => 'required|integer|min:1',
            'adults'     => 'required|integer|min:1',
            'children'   => 'nullable|integer|min:0',
            'name'       => 'required|string|max:150',
            'mobile'     => 'required|string|max:20',
            'email'      => 'nullable|email|max:150',
            'message'    => 'nullable|string|max:1000',
        ]);

        // status is always 'pending' by default when a new query comes in
        $data['status'] = 'pending';

        TravelQuery::create($data);

        return back()->with('success', 'Aapki query successfully bhej di gayi hai! Hum jald hi aapse contact karenge.');
    }

    // Admin: list all queries (pending first)
    public function index()
    {
        $queries = TravelQuery::orderByRaw("FIELD(status, 'pending','contacted','confirmed','cancelled')")
            ->latest()
            ->paginate(15);

        return view('dashboard.admin-query', compact('queries'));
    }

    // Admin: update status (pending -> contacted -> confirmed / cancelled)
    public function updateStatus(Request $request, TravelQuery $query)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,confirmed,cancelled',
        ]);

        $query->update(['status' => $request->status]);

        return back()->with('success', 'Status Updated Successfully.');
    }

    // Admin: delete a query
    public function destroy(TravelQuery $query)
    {
        $query->delete();
        return back()->with('success', 'Query Deleted Successfully.');
    }
}