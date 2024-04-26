<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;



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
            return redirect()->intended(route('homepage'));
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
        //return redirect(route('homepage'));
        return view('homepage');

    } 



    //
   
    function storeProduct(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required'
        ]);
    
        // Create a new product instance and fill it with the request data
        $product = new Product();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
    
        // Save the product to the database
        $product->save();
    
        // Retrieve all products to pass to the view
        $products = Product::all();
      //  dd($products);
    
        // Pass the $products variable to the view
        return view('Products', ['us2' => $products]);
    }
   
    
    //
}
