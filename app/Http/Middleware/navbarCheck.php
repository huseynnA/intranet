<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class navbarCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
    
        if ($user->role == 1) {
            // Machinist user
            $verticalMenuPath = base_path('resources/menu/verticalMenuMechanic.json');
        } else {
            // Other users
            $verticalMenuPath = base_path('resources/menu/verticalMenu.json');
        }
    
        // Load vertical menu data
        $verticalMenuJson = file_get_contents($verticalMenuPath);
        $verticalMenuData = json_decode($verticalMenuJson);
    
        // Load horizontal menu data
        $horizontalMenuJson = file_get_contents(base_path('resources/menu/horizontalMenu.json'));
        $horizontalMenuData = json_decode($horizontalMenuJson);
    
        // Share menuData with all views
        \View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
    
        return $next($request);
    }
    
}
