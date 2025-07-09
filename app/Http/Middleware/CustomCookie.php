<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class CustomCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        
        
        if($request->hasCookie('ccookie'))
    {
        return $next($request);
    }
    else
    {
        $uuid = str()->random();
        Cookie::queue(Cookie::forever('ccookie', $uuid));
    }

        
        
        
        
        
        
        
        
        
        
        
        
        return $next($request);
    }
}
