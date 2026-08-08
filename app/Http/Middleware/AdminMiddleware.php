<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // User login nahi hai
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        // Login hai lekin admin nahi hai
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        // Admin hai
        return $next($request);
    }
}