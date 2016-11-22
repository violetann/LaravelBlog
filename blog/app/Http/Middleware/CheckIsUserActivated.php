<?php
namespace App\Http\Middleware;
use Closure;
Use Session;
class CheckIsUserActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( (auth()->user()->activated == false) && config('settings.activation')) {
            Session::flash('errors','Please activate your email.'); 
            return redirect()->route('index');
        }
        return $next($request);
    }
}