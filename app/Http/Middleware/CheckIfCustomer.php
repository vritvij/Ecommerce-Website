<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckIfCustomer
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
        if (Auth::user()->seller) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
