<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class isUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (Auth::user()->isUser() || Auth::user()->isMachinist() )) {
            if(Auth::user()->isMachinist())
            {
                $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenuMechanic.json'));
                $verticalMenuData = json_decode($verticalMenuJson);
                $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json'));
                $horizontalMenuData = json_decode($horizontalMenuJson);
              
                // Share all menuData to all the views
                \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
    
    
            }
            return $next($request);
        }

        abort(403, 'Unauthorized action.(U must be user)');
    }
}