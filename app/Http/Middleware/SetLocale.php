<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
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
        if ($request->has('lang')) {
            session(['lang' => $request->lang]);
        }

        $lang =  session('lang') ?? 'en';

        app()->setLocale($lang);

        return $next($request);
    }
}
