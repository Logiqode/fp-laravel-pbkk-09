<?php

use App\Models\Listing;
use Illuminate\Support\Arr;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});
Route::get('/dashboard', function () {
    return redirect('/');
});

Route::get('/listings', [ListingController::class, 'index']);

Route::get('/listings/{listing:slug}', function (Listing $listing) {
    return view('listing', ['title' => 'Listing', 'listing' => $listing]);
});

Route::get('/cart', function () {
    return view('cart', ['title' => 'Shopping Cart']);
})->middleware('auth');

Route::get('/notifications', function () {
    return view('notifications', ['title' => 'Notifications']);
})->middleware('auth');

Route::get('/wishlist', function () {
    return view('wishlist', ['title' => 'Wishlist']);
})->middleware('auth');

Route::get('/store', function () {
    return view('store', ['title' => 'Store']);
})->middleware('auth');

Route::get('/profile', function () {
    return view('profile', ['title' => 'Your Profile']);
})->middleware('auth');

Route::get('/settings', function () {
    return view('settings', ['title' => 'Settings']);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'create']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/{productId}/add', [CartController::class, 'add']);
    Route::delete('/cart/{productId}/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/{productId}/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/clear', [CartController::class, 'clear']);

    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/{productId}/add', [WishlistController::class, 'add']);
    Route::delete('/wishlist/{productId}/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
});
