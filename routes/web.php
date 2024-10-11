<?php

use App\Http\Controllers\AdminController;
use App\Models\Listing;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});
Route::get('/dashboard', function () {
    return redirect('/');
});

Route::get('/listings', function () {
    return view('listings', ['title' => 'Listings', 'listings' => Listing::all()]);
});

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