<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsLoggedIn
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return back()->with('show_login', true)
                          ->with('info', 'Please login or sign up to make a booking.');
        }

        return $next($request);
    }
}