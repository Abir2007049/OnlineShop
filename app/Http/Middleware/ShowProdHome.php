<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShowProdHome
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
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required'
        ]);

        // Proceed with the request
        return $next($request);
    }
}
