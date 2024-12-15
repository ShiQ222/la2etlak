<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
{
    \Log::info('RedirectIfAuthenticated middleware triggered');

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            \Log::info('User is authenticated, redirecting to dashboard');
            return redirect('/dashboard'); // Redirects logged-in users to the dashboard
        }
    }

    return $next($request);
}

}
