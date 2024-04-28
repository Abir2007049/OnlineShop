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
        {    $products = Product::all();
            $femaleProducts =Femproduct::all();
            // Pass both sets of products to the view
            return view('homepage', compact('products', 'femaleProducts'));
           // return view('homepage');
           
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
    $user=User::create($data);
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

        $products = Product::all();
        $femaleProducts =Femproduct::all();
        // Pass both sets of products to the view
        return view('homepage', compact('products', 'femaleProducts'));

        //return redirect(route('homepage'));
       // return view('homepage');

    } 



    //
   
    function storeProduct(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);
        if($request->has('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/Product';
            $file->move($path,$filename);
        }
    
        // Create a new product instance and fill it with the request data
        $product = new Product();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->image = $path.$filename;
    
        // Save the product to the database
        $product->save();
    
        // Retrieve all products to pass to the view
        $products = Product::all();
      //  dd($products);
    
        // Pass the $products variable to the view
        return view('Products', ['us2' => $products]);
    }
    function storeFemProduct(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);
        if($request->has('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/Femproduct';
            $file->move($path,$filename);
        }
    
        // Create a new product instance and fill it with the request data
        $product = new Femproduct();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->image = $path.$filename;
    
        // Save the product to the database
        $product->save();
    
        // Retrieve all products to pass to the view
        $products = Femproduct::all();
         dd($products);
    
        // Pass the $products variable to the view
        return view('FemProducts', ['us2' => $products]);
    }
    function storeEProduct(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'image'=>'required|mimes:png,jpg,jpeg'
        ]);
        if($request->has('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $path='uploads/Eproduct';
            $file->move($path,$filename);
        }
    
        // Create a new product instance and fill it with the request data
        $product = new Eproduct();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->image = $path.$filename;
    
        // Save the product to the database
        $product->save();
    
        // Retrieve all products to pass to the view
        $products = Eproduct::all();
      //  dd($products);
    
        // Pass the $products variable to the view
        return view('EProducts', ['us2' => $products]);
    }
    function seeProduct()
    {
        return view('Products');
    }


    
    public function getProd()
    { 
        // Retrieve all products and female products from the database
        $products = Product::all();
        $femaleProducts =Femproduct::all();
        // Pass both sets of products to the view
        return view('homepage', compact('products', 'femaleProducts'));
    }
   /*public function GetFemProd()
   { 
    

       $fproduct = DB::table('femproducts')->get();
       //dd($products);
   
       // Pass the $products variable to the view
       return view('homepage',compact('fproduct') );
   }
    */
}
   