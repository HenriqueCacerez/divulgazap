<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIps = [
            '127.0.0.1' // Localhost
        ];

        if (!in_array($request->ip(), $allowedIps)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}