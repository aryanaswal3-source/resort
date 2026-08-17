<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SignupNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|min:6|confirmed',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('profile_photo')) {
            $photoPath = $request->file('profile_photo')->store('profile-photos', 'public');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'password' => Hash::make($data['password']),
            'profile_photo' => $photoPath,
            'role' => 'user',
        ]);

       Mail::to('aryanaswal3@gmail.com')->send(new SignupNotification($data));

        Auth::login($user);

        return back()->with('success', 'Account created! You are now logged in.');
    }
}