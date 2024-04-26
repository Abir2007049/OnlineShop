<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Middleware\Isadmin;
use App\Http\Middleware\ShowProducts;


Route::get('/', function () {
    return view('homepage');
})->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->middleware(Isadmin::class)->name('login.post');
Route::get('/registration',  [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/catogories', [catController::class,'index'])->middleware(ShowProducts::class)->name('products');
Route::post('/send-product', [AuthManager::class, 'storeProduct'])->name('send.product');
Route::get('/send-product', [AuthManager::class, 'storeProduct'])->name('send.product');
