<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsMachinist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //this middleware protect only machinist routes 
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isMachinist() ) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.(U must be machinist)');
    }
}
