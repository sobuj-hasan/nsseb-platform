<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;

class VendorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 2) {
            return $next($request);
        } else {
            Notify::error("You dont have permission to access this page. Please login to as a Vendor", 'Error');
            return redirect('/login');
        }
    }
}
