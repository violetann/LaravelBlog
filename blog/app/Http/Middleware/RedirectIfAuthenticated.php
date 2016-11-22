<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
Use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            Session::flash('info','Please activate your email. <a href="'. route('authenticated.activation-resend') .'">Resend</a> activation email.'); 
            return redirect()->route('index');
        }

        return $next($request);
    }
}
