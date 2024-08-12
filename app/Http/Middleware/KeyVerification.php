<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class KeyVerification
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
        if(Auth::check()) {
            $shops = $request->user();
            //user role == 0
            if(!$shops->keyshopId && !$shops->lenashopId && !$shops->zerashopId ) {
                return response(['false', $shops,'false'], 405);
            } else {
                return $next($request);
            }
        } else {
            return route('login');
        }
        return $next($request);
    }
}
