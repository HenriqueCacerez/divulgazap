<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckReferer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedReferer = env('APP_URL'); // Adicione o domínio da sua aplicação aqui
        
        if ($request->headers->has('referer')) {
            $referer = $request->headers->get('referer');
            if (strpos($referer, $allowedReferer) !== 0) {
                return response()->json(['message' => 'Unauthorized.'], 403);
            }
        } else {
            return response()->json(['message' => 'Forbidden.'], 403);
        }
        
        return $next($request);
    }
}