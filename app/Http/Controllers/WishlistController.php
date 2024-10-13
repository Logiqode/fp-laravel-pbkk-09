<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist', [
            'title' => 'Wishlist',
            'wishlistItems' => Wishlist::where('user_id', Auth::id())->get()
        ]);
    }

    public function add(Request $request, $productId)
    {
        $wishlistItem = Wishlist::where('user_id', Auth::id())
            ->where('listing_id', $productId)
            ->first();
        if ($wishlistItem) {
            return redirect()->back()->with('error', 'Item already in wishlist.');
        } else {
            Wishlist::create([
                'user_id' => Auth::id(),
                'listing_id' => $productId
            ]);
        }

        return redirect()->back()->with('success', 'Item added to wishlist.');
    }

    public function remove($productId)
    {
        $deleted = Wishlist::where('user_id', Auth::id())
            ->where('listing_id', $productId)
            ->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Item removed from wishlist.');
        }

        return redirect()->back()->with('error', 'Item not found in wishlist.');
    }
}
