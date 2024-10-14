<?php

use App\Models\Listing;
use Illuminate\Support\Arr;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RegisterController;

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

Route::middleware('auth')->group(function () {
    Route::get('/store', [StoreController::class, 'index'])->name('store.index');
    Route::get('/store/create', [StoreController::class, 'create'])->name('store.create');
    Route::post('/store', [StoreController::class, 'store'])->name('store.store');

    Route::get('/store/{slug}', [StoreController::class, 'show'])->name('store.show');
});

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

// Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/{id}/suspend', [AdminController::class, 'suspendStore'])->name('admin.suspend');
    Route::delete('/admin/{id}/remove', [AdminController::class, 'removeStore'])->name('admin.remove');
    Route::post('/admin/{id}/verify', [AdminController::class, 'verifyStore'])->name('admin.verify');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/{productId}/add', [CartController::class, 'add']);
    Route::delete('/cart/{productId}/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/{productId}/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/clear', [CartController::class, 'clear']);
});
