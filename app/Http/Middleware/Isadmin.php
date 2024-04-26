<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

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

           // dd( Auth::attempt($credentials)  );



            if( Auth::attempt($credentials)  && Auth::user()->is_admin == 1)
            {
                $us=User::all();
               // return redirect(route('admin'))->with("success", "Welcome Dear Admin!");

               return response()->view('admin',compact('us'));
            }


            else if(Auth::attempt($credentials)  && Auth::user()->is_admin==0)
            {
             return response()->view('homepage');
            } 
            else 
            {
                return redirect()->route('login')->with('error','Invalid');
            }

           // dd(Auth::user()->is_admin); 
            abort(401);
           
            
        }
    }  
    

