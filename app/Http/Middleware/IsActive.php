<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seller = Auth::guard('seller')->user();

        // Check if there's an authenticated seller
        if (!$seller) {
            // Redirect or handle the case where there's no authenticated seller
            return redirect()->route('seller.login'); // Redirect to seller login page, for example
        }

        // Check if the seller is active
        if ($seller->is_active == 0) {
            return redirect()->route('seller.deactivate'); // Redirect to a deactivated seller page, for example
        }

        return $next($request);
    }
}
