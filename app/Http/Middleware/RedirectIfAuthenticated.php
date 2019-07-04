<?php

namespace App\Http\Middleware;

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
            // return redirect('/home');

            $role = Auth::user()->role; 
        
        // Check user role
        switch ($role) {
            case 1:
                    return redirect('/admin/dashboard');
                break;
            case 0:
                return redirect('/dashboard');
                break; 
            default:
                return redirect('/register');
                break;
        }

        }

        return $next($request);
    }
}
