<?php

namespace SupremeSTAN\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
            if(Auth::user()->hasRole('owner','superadmin','curriculum','finance','admin_account','admin_content')) {
                return redirect('/admin/home');
            }else{
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
