<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Idemonbd\Notify\Facades\Notify;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminMiddleware
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
        if (auth()->check() && auth()->user()->role == 1) {
            return $next($request);
        }
        Notify::error("You dont have permission to access this page. Please login to verify", 'Error');
        return redirect('/login');
    }
}
