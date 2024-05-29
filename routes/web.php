<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Middleware\Isadmin;
use App\Http\Middleware\ShowProducts;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;

Route::post('/order/delivered/{id}', [OrderController::class, 'markAsDelivered'])->name('order.delivered');


 Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/', function () {
  
    $products = DB::table('products')->get();
    $femaleProducts = DB::table('femproducts')->get();
    
    return view('homepage', compact('products', 'femaleProducts'));
})->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
  Route::post('/login', [AuthManager::class, 'loginPost'])->middleware(Isadmin::class)->name('login.post');
Route::get('/registration',  [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/catogories', [catController::class,'index'])->middleware(ShowProducts::class)->name('products');
Route::get('/catogories', [catController::class,'index'])->middleware(ShowFemProducts::class)->name('femproducts');
Route::get('/catogories', [catController::class,'index'])->middleware(ShowEProducts::class)->name('eproducts');
Route::post('/send-product', [AuthManager::class, 'storeProduct'])->name('send.product');
//Route::get('/send-product', [AuthManager::class, 'storeProduct'])->name('send.product');
Route::post('/send-femproduct', [AuthManager::class, 'storeFemProduct'])->name('send.femproduct');
//Route::get('/send-product', [AuthManager::class, 'storeFemProduct'])->name('send.femproduct');
Route::post('/send-eproduct', [AuthManager::class, 'storeEProduct'])->name('send.eproduct');
Route::get('/showProd', [AuthManager::class, 'seeProduct'])->name('show.product');
Route::get('/showProd2', [AuthManager::class, 'seeFemProduct'])->name('show.femproduct');
//Route::get('/send-product', [AuthManager::class, 'storeEProduct'])->name('send.eproduct');
//Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::get('/', [AuthManager::class, 'getProd'])->name('home');
Route::post('/send-orders', [AuthManager::class, 'storeOrder'])->name('send.order');
Route::get('/see-orders', [AuthManager::class, 'showOrder'])->name('see.order');
Route::get('/see-acc', [AuthManager::class, 'ShowUser'])->name('Show.Acc');


Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'search'])->name('search.perform');
use App\Http\Controllers\ProductController;

Route::delete('/products/{id}', [AuthManager::class, 'destroy'])->name('products.destroy');
Route::delete('/femproducts/{id}', [AuthManager::class, 'destroyFem'])->name('femproducts.destroy');
Route::delete('/orders/{id}', [OrderController::class, 'destroyOrder'])->name('order.destroy');

