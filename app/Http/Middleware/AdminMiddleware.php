<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access admin panel.');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect()->route('books.index')->with('error', 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
