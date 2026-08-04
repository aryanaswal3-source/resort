<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services (public page).
     */
    public function index()
    {
        $services = Service::all();

        return view('site.services', compact('services'));
    }
}