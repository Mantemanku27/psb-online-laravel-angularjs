<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Menangani permintaan masuk.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // login
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->level == 0 AND Auth::user()->level <=99){
                return redirect()->route('pendaftaran');
            }
        }
        return $next($request);
        // end login
    }
}
