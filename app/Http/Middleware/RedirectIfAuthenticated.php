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
        switch (Auth::guard($guard)->check()) {
            case 'admin':
                return redirect()->route('admin.index');
                break;

            case 'staff':
                return redirect()->route('staff.index');
                break;

            case 'guardian':
                return redirect()->route('guardian.index');
                break;
            
            default:
                 if (Auth::guard($guard)->check()) {
                    return redirect('student.index');
                }
                break;
        }
       

        return $next($request);
    }
}
