<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate login form
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Check email & password
        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            // Regenerate session after successful login
            $request->session()->regenerate();

            // Admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Normal user
            return redirect()->route('home');
        }

        // Login failed
        return back()
            ->withErrors([
                'email' => 'The email or password is incorrect.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
