<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class AdminProfileController extends Controller
{
    public function index()
    {
        if (! Auth::check()) {
            return redirect()->route('home');
        }

        $user = Auth::user();
        $totalUsers = User::count();

        return view('admin.profile', compact('user', 'totalUsers'));  
    }
}