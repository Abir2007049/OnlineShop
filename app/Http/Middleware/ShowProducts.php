<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ShowProducts
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
        $us2=Product::all();

        return response()->view('Products',compact('us2'));
        
        
    }
}
