<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\catController;
use App\Http\Middleware\Isadmin;
use App\Http\Middleware\ShowProducts;
use App\Http\Middleware\ShowFemProducts;
use App\Http\Middleware\ShowEProducts;

// Homepage route (only one)
Route::get('/', [AuthManager::class, 'getProd'])->name('home');

// Authentication routes
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->middleware(Isadmin::class)->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Category routes with different middleware
Route::get('/catogories/male', [catController::class,'index'])->middleware(ShowProducts::class)->name('products');
Route::get('/catogories/female', [catController::class,'index'])->middleware(ShowFemProducts::class)->name('femproducts');
Route::get('/catogories/electronics', [catController::class,'index'])->middleware(ShowEProducts::class)->name('eproducts');

// Product submission routes
Route::post('/send-product', [AuthManager::class, 'storeProduct'])->name('send.product');
Route::post('/send-femproduct', [AuthManager::class, 'storeFemProduct'])->name('send.femproduct');
Route::post('/send-eproduct', [AuthManager::class, 'storeEProduct'])->name('send.eproduct');

// Product views
Route::get('/showProd', [AuthManager::class, 'seeProduct'])->name('show.product');
Route::get('/showProd2', [AuthManager::class, 'seeFemProduct'])->name('show.femproduct');

// Product delete
Route::delete('/products/{id}', [AuthManager::class, 'destroy'])->name('products.destroy');
Route::delete('/femproducts/{id}', [AuthManager::class, 'destroyFem'])->name('femproducts.destroy');

// Order routes
Route::post('/send-orders/{code}', [AuthManager::class, 'storeOrder'])->name('send.order');
Route::post('/send-forders/{code}', [AuthManager::class, 'storeFemOrder'])->name('send.forder');
Route::post('/order/delivered/{id}', [OrderController::class, 'markAsDelivered'])->name('order.delivered');
Route::delete('/orders/{id}', [OrderController::class, 'destroyOrder'])->name('order.destroy');
Route::get('/see-orders', [AuthManager::class, 'showOrder'])->name('see.order');


// Account
Route::get('/see-acc', [AuthManager::class, 'ShowUser'])->name('Show.Acc');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::post('/search', [SearchController::class, 'search'])->name('search.perform');

// Product detail views
Route::get('/products/{id}', [AuthManager::class, 'ProductData'])->name('product.data');
Route::get('/fproducts/{id}', [AuthManager::class, 'FemProductData'])->name('fproduct.data');

// Cart
Route::post('/cart/remove/{code}', [AuthManager::class, 'remove'])->name('cart.remove');
Route::get('/cart', [AuthManager::class, 'show'])->name('cart.show');
