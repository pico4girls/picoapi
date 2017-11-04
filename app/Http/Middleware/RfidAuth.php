<?php

namespace App\Http\Middleware;

use Closure;

class RfidAuth
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
        // check if user exists with rfid_token

        // If the user is not registered create user and request info

        return $next($request);
    }
}
