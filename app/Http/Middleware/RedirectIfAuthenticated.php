<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, ...$guards)
    // {
    //     // $guards = empty($guards) ? [null] : $guards;

    //     // foreach ($guards as $guard) {
    //     //     if (Auth::guard($guard)->check()) {
    //     //         return redirect(RouteServiceProvider::HOME);
    //     //     }
    //     // }

    //     // return $next($request);

    //     if (Auth::guard($guards)->check()) {
    //          $role = $request->user()->role; 
        
    //         switch ($role) {
    //           case 'Admin':
    //              return redirect('/dashboard');
    //              break;
        
    //           default:
    //              return redirect('/'); 
    //              break;
    //         }
    //       }
    //       return $next($request);
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;

                switch ($role) {
                    case 'Admin':
                        return redirect('/admin/dashboard'); // Adjust the URL based on your routes
                        break;

                    case 'Supplier':
                        return redirect('/supplier/dashboard'); // Adjust the URL based on your routes
                        break;

                    // Add more cases as needed for other roles

                    default:
                        return redirect('/');
                        break;
                }
            }
        }

        return $next($request);
    }
}
