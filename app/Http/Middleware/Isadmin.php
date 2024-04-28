<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Femproduct;

class Isadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     * **/

    public function handle(Request $request, Closure $next): Response
    {    
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials) && Auth::user()->is_admin == 1) {
            $us = User::all();
            return response()->view('admin', compact('us'));
        } else if (Auth::attempt($credentials) && Auth::user()->is_admin == 0) {
            $products = Product::all();
            $femaleProducts = Femproduct::all();
            return response()->view('homepage', compact('products', 'femaleProducts'));
        } else {
            return redirect()->route('login')->with('error', 'Invalid');
        }

        // If none of the conditions are met, return a 401 response
        abort(401);
    }
}  
