<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowFemProducts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required'
        ]);
        $us2=Femproduct::all();

        return response()->view('Femproducts',compact('us2'));
    }
}
