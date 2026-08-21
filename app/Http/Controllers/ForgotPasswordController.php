<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'No account found with this email address.');
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => Hash::make($token),
            'created_at' => now(),
        ]);

        $resetUrl = url('/reset-password/' . $token) . '?email=' . urlencode($request->email);

        $emailService = new EmailService();

        $html = $emailService->buildEmailHtml([
            'headerLabel' => 'PASSWORD RESET REQUEST',
            'greeting' => 'Hi ' . $user->name . ',',
            'paragraphs' => [
                'We received a request to reset your password. Click the button below to choose a new password.',
                'This link will expire in 60 minutes. If you did not request this, you can safely ignore this email.',
            ],
            'ctaText' => 'Reset Password',
            'ctaUrl' => $resetUrl,
        ]);

        Mail::html($html, function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Your Password - Sunset Vista Resort');
        });

        return back()->with('success', 'A password reset link has been sent to your email.');
    }

    public function showResetForm($token)
    {
        $email = request('email');

        return view('site.reset-password', compact('token', 'email'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$record) {
            return back()->with('error', 'Invalid or expired reset link. Please request a new one.');
        }

        if (now()->diffInMinutes($record->created_at) > 60) {
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->with('error', 'This reset link has expired. Please request a new one.');
        }

        if (!Hash::check($request->token, $record->token)) {
            return back()->with('error', 'Invalid reset link.');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('home')->with('success', 'Your password has been reset successfully! You can now sign in.');
    }
}