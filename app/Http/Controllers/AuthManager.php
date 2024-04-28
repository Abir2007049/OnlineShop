<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Femproduct;
use App\Models\Eproduct;
use App\Models\Order;

class AuthManager extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $products = Product::all();
            $femaleProducts = Femproduct::all();
            return view('homepage', compact('products', 'femaleProducts'));
        }
        return redirect(route('login'))->with("error", "Login Details Are Not Valid");
    }

    public function registrationPost(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Try Again!");
        }
        return redirect(route('login'))->with("success", "Success! Try to Login");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        $products = Product::all();
        $femaleProducts = Femproduct::all();
        return view('homepage', compact('products', 'femaleProducts'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'image' => 'image'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('male'), $imageName);
            $imagePath = 'male/' . $imageName;
        }

        $product = new Product();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->image = $imagePath ?? '';

        $product->save();

        $products = Product::all();
        return view('Products', ['us2' => $products]);
    }

    public function storeFemProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/Femproduct';
            $file->move($path, $filename);
        }

        $product = new Femproduct();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->image = $path . $filename;

        $product->save();

        $products = Femproduct::all();

        return view('FemProducts', ['us2' => $products]);
    }

    public function storeEProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'uploads/Eproduct';
            $file->move($path, $filename);
        }

        $product = new Eproduct();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->image = $path . $filename;

        $product->save();

        $products = Eproduct::all();

        return view('EProducts', ['us2' => $products]);
    }

    public function seeProduct()
    {
        return view('Products');
    }

    public function getProd()
    {
        $products = Product::all();
        $femaleProducts = Femproduct::all();
        return view('homepage', compact('products', 'femaleProducts'));
    }
    
    public function storeOrder(Request $request)
    {
        // Retrieve data from the request
        $productId = $request->input('Id');
        $userEmail = $request->input('email');
        $address= $request->input('address');
        //$code= $request->input('Code');
        // Find the user by email
        //$user = User::where('email', $userEmail)->first();
    
        // Create a new order
        $order = new Order();
        $order->ProductId = $productId;
        $order->Email = $userEmail;
        $order->Address = $address; // Assuming you also want to store the product code
        $order->save();
    
        // You might also want to return a response or redirect somewhere
        //return redirect()->route('send.order')->with('success', 'Order placed successfully!');
        $products = Product::all();
        $femaleProducts = Femproduct::all();
        
        return view('homepage',compact('products','femaleProducts'));
    }
    function showOrder()
    {
        $data=Order::all();
        return view('orders',compact('data'));

    }



    
}
