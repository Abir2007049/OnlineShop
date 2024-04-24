<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    //
    function login()
    {
        return view('login');

    }
    function registration()
    {
        return view('registration');

    }
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //$request->password;

    
    $credentials = $request->only('email','password');
    if(Auth::attempt($credentials))
    {
        return redirect()->intended(route('home'));
    }
    return redirect(route('login'))->with("error", "Login Details Are Not Valid");
    }
    function registrationPost(Request $request)
    {
       /* $request->validiate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);*/
        //$request->password;
    $data['name'] = $request->name; 
    $data['email'] =$request->email;    

    $data['password'] = Hash::make($request->password);    
    $user=user::create($data);
    if(!$user)
    {
        return redirect(route('registration'))->with("error", "Try Again!");

    }
    return redirect(route('login'))->with("success", "Success!Try to Login");

    
    
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));

    }
}
