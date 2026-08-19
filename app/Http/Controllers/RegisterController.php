<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmailService;
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

        $emailService = new EmailService();

        // Email to Admin
        $adminHtml = $emailService->buildEmailHtml([
            'headerLabel' => 'NEW USER REGISTERED',
            'paragraphs' => ['A new user has just signed up on your website.'],
            'rows' => [
                'Name' => e($data['name']),
                'Email' => e($data['email']),
                'Phone' => e($data['phone'] ?? 'N/A'),
                'Registered On' => now()->format('d M Y, h:i A'),
            ],
        ]);

        Mail::html($adminHtml, function ($message) {
            $message->to(env('ADMIN_EMAIL'))->subject('New User Registered');
        });

        // Email to User (Welcome)
        $userHtml = $emailService->buildEmailHtml([
            'centerHeader' => true,
            'headerLabel' => 'RELAX • UNWIND • ENJOY',
            'greeting' => 'Welcome, ' . $data['name'] . '! 🎉',
            'paragraphs' => [
                "Thank you for creating an account with Sunset Vista Resort. We're thrilled to have you join us!",
                'You can now browse our rooms, explore our services, and book your perfect getaway with just a few clicks.',
            ],
            'ctaText' => 'Explore Our Resort',
            'ctaUrl' => url('/'),
            'closingNote' => 'If you have any questions, feel free to reach out to our support team anytime.',
        ]);

        Mail::html($userHtml, function ($message) use ($data) {
            $message->to($data['email'])->subject('Welcome to Sunset Vista Resort!');
        });

        Auth::login($user);

        return back()->with('success', 'Account created! You are now logged in.');
    }
}