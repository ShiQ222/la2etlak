<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    if (auth()->check() && !auth()->user()->is_active) {
        auth()->logout(); // Log the user out

        // Add an error message to the session
        return redirect()->route('login')->with('error', 'Your account has been disabled. Please contact support.');
    }

    return $next($request);
}

}


