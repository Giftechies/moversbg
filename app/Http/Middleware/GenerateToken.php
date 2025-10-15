<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GenerateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Generate a token for the unauthenticated user
            $token = auth()->createToken('guest')->plainTextToken;
            // Return the token in the response or set it in a cookie
        }
        return $next($request);
    }
}
