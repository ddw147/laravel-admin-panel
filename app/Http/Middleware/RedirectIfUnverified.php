<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfUnverified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!Auth::user()->is_verified) {
                Auth::user()->sendotp();
                return redirect('/otpverification');
        }

        return $next($request);
    }
}
