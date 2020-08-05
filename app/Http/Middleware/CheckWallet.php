<?php

namespace App\Http\Middleware;

use Closure;

class CheckWallet
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
        if($request->user()->hasWallet()){
            return $next($request);
        }

        // Display a 403 Forbidden error
        abort(403);
    }
}
