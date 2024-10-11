<?php

use App\Models\Listing;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/listings', function () {
    return view('listings', ['title' => 'Listings', 'listings' => Listing::all()]);
});

Route::get('/listings/{listing:slug}', function (Listing $listing) {
    return view('listing', ['title' => 'Listing', 'listing' => $listing]);
});

Route::get('/cart', function () {
    return view('cart', ['title' => 'Shopping Cart']);
});

Route::get('/notifications', function () {
    return view('notifications', ['title' => 'Notifications']);
});

Route::get('/wishlist', function () {
    return view('wishlist', ['title' => 'Wishlist']);
});

Route::get('/store', function () {
    return view('store', ['title' => 'Store']);
});

Route::get('/profile', function () {
    return view('profile', ['title' => 'Your Profile']);
});

Route::get('/settings', function () {
    return view('settings', ['title' => 'Settings']);
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);
