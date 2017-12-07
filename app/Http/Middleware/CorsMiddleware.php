<?php
namespace App\Http\Middleware;

class CorsMiddleware
{
    public function handle($request, \Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Origin, Accept, Content-Type, Authorization, Access-Control-Allow-Origin');
        $response->header('Access-Control-Allow-Origin', '*');
        return $response;
    }
}