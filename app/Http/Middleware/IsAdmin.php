<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        /**
         * There will be 2 types of users for the application.
         * First will be Frontend users and second is Admin users.
         * Admin users can access Admin Section and Roles Permissions will be applicable
         * to only Admin users.
         * Admin user with Super Admin Role will be allowed all permissions which is defined 
         * in AuthServiceProvider
         */
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
