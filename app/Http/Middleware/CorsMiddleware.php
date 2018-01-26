<?php
namespace App\Http\Middleware;

class CorsMiddleware
{
    public function handle($request, \Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
}