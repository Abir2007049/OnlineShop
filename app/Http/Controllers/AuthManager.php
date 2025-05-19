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
        $data['cell'] = $request->cell;
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
            'FibreType'=>'required',
            'Size'=>'required',
            'image' => 'image'
            
        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = $image->getClientOriginalName();
        //     $image->move(public_path('male'), $imageName);
        //     $imagePath = 'male/' . $imageName;
        // }

        $imgLink = $request->file('image')->storeAs(
            'public/male',
            $request->image->getClientOriginalName());
        $url = asset('storage/' . str_replace('public/', '', $imgLink));

        $product = new Product();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->FibreType = $request->FibreType;
        $product->Size = $request->Size;
        $product->image = $url ?? '';

        $product->save();

        $products = Product::all();
        return response()->view('admin');
    }

    public function storeFemProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'code' => 'required',
            'FibreType'=>'required',
            'Size'=>'required',

            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        // if ($request->has('image')) {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $path = 'uploads/Femproduct';
        //     $file->move($path, $filename);
        // }
        $imgLink = $request->file('image')->storeAs(
            'public/female',
            $request->image->getClientOriginalName());
        $url = asset('storage/' . str_replace('public/', '', $imgLink));

        $product = new Femproduct();
        $product->Name = $request->name;
        $product->Price = $request->price;
        $product->Code = $request->code;
        $product->FibreType = $request->FibreType;
        $product->Size = $request->Size;
        $product->image = $url ?? '';

        $product->save();

        $products = Femproduct::all();

        return response()->view('admin');
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
    { $Products=Product::all();
        return view('Products', compact('Products',));
    }
    public function seeFemProduct()
    {
        $femaleProducts=Femproduct::all();
        return view('FemProducts', compact('femaleProducts',));
    }

    public function getProd()
    {
        $products = Product::all();
        $femaleProducts = Femproduct::all();
        return view('homepage', compact('products', 'femaleProducts'));
    }
    
    public function storeOrder($code)
{
    $product = Product::where('Code', $code)->first();

    if (!$product) {
        return redirect()->back()->withErrors(['Product not found.']);
    }

    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->withErrors(['Please login to place an order.']);
    }

    if (is_null($user->cell)) {
        return redirect()->back()->withErrors(['Cell number is required to place an order.']);
    }

    // ✅ Add to session cart
    $cart = session()->get('cart', []);
$cart[] = [
    'Name' => $product->Name,
    'Code' => $product->Code,
    'Price' => $product->Price,
    // You can add 'Image' => $product->Image, etc.
];
session()->put('cart', $cart);


    // ✅ Optionally save to DB if you want a persistent log
    $order = new Order();
    $order->Code = $product->Code;
    $order->Email = $user->email;
    $order->Cell = $user->cell;
    $order->DeliveryStatus = 'Not Delivered';
    $order->save();

    // ✅ Redirect back to homepage to see cart
    return redirect()->route('home')->with('success', 'Product added to cart successfully!');
}

    public function ShowUser(Request $request)
    {
       $acc=User::all();
     
        return view('ShowAcc',compact('acc'));
    }
    public function storeFemOrder($code)
{
    $product = Femproduct::where('Code', $code)->first();

    if (!$product) {
        return redirect()->back()->withErrors(['Product not found.']);
    }

    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->withErrors(['Please login to place an order.']);
    }

    if (is_null($user->cell)) {
        return redirect()->back()->withErrors(['Cell number is required to place an order.']);
    }

    // ✅ Add to session cart
    $cart = session()->get('cart', []);
$cart[] = [
    'Name' => $product->Name,
    'Code' => $product->Code,
    'Price' => $product->Price,
    // You can add 'Image' => $product->Image, etc.
];
session()->put('cart', $cart);


    // ✅ Optionally save to DB
    $order = new Order();
    $order->Code = $product->Code;
    $order->Email = $user->email;
    $order->Cell = $user->cell;
    $order->DeliveryStatus = 'Not Delivered';
    $order->save();

    // ✅ Redirect to home with success
    return redirect()->route('home')->with('success', 'Product added to cart successfully!');
}




    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('show.product')->with('success', 'Product deleted successfully.');
      
    }
    public function destroyFem($id)
    {
        $product=Femproduct::findOrFail($id);
        $product->delete();
        return redirect()->route('show.femproduct')->with('success', 'Product deleted successfully.');
      
    }
    public function ProductData($id)
    {
        $data=Product::find($id);
        if (!$data) {
            // Option 1: Return a 404 error page
            abort(404, 'Product not found');
    
            // Option 2: Redirect with an error message (if you want to redirect)
            // return redirect()->route('products.index')->with('error', 'Product not found.');
        }
        return view('ShowProductsData',compact('data'));
    }
    public function FemProductData($id)
    {
        $data=Femproduct::find($id);
        if (!$data) {
            // Option 1: Return a 404 error page
            abort(404, 'Product not found');
    
            // Option 2: Redirect with an error message (if you want to redirect)
            // return redirect()->route('products.index')->with('error', 'Product not found.');
        }
        return view('ShowFemProductsData',compact('data'));
    }

   function showOrder()
    {
        $orders=Order::all();
        return view('orders',compact('orders'));

    }



// public function home()
//     {
//         $femaleProducts = Femproduct::all();
//         $products = Product::all();
//         $cart = session()->get('cart', []);

//         return view('home', compact('femaleProducts', 'products', 'cart'));
//     }
//     public function addToCart(Request $request, $code)
// {
//     $product = Product::where('Code', $code)->first();

//     if (!$product) {
//         return redirect()->back()->with('error', 'Product not found');
//     }

//     $cart = session()->get('cart', []);
    
//     $cart[$code] = [
//         'name' => $product->Name,
//         'price' => $product->Price,
//         'image' => $product->Image
//     ];

//     session()->put('cart', $cart);

//     return redirect()->back()->with('success', 'Product added to cart');
// }
public function remove($code)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$code])) {
        unset($cart[$code]);
        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Item removed from cart');
}
public function show()
    {
        $cart = session('cart', []); // Retrieve cart from session
        return view('cart', compact('cart'));
    }


    
}
