<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'signin'])->name('signin');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'signup'])->name('signup');

Route::get('/product', [ProductController::class, 'index'])->name('products');

Route::get('/cart', [CartController::class, 'index'])->name('carts');
Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'delete'])->name('cart.delete');

Route::get('/products', [ProductController::class, 'addproduct'])->name('addproduct');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/update{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/delete{id}', [ProductController::class, 'delete'])->name('product.delete');


Route::get('/search', [ProductController::class, 'search'])->name('search');

use App\Http\Controllers\BannerController;

Route::resource('banners', BannerController::class);
