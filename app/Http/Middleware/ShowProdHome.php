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
    
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required'
        ]);

    
        return $next($request);
    }
}
