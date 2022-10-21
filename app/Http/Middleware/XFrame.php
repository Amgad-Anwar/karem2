<?php

namespace App\Http\Middleware;

use Closure;
use http\Header;
use Illuminate\Http\Request;

class XFrame
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request)->headers->set('X-Frame-Options', 'SAMEORIGIN', false);
    }
}
