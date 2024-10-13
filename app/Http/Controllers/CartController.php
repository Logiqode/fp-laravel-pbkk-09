<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $productId)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('listing_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'listing_id' => $productId,
                'quantity' => $request->input('quantity', 1),
            ]);
        }
        return redirect()->back()->with('success', 'Item added to cart.');
    }

    public function index()
    {
        return view('cart', [
            'title' => 'Cart',
            'cartItems' => Cart::where('user_id', Auth::id())->get()
        ]);
    }

    public function remove($productId)
    {
        $deleted = Cart::where('user_id', Auth::id())
            ->where('listing_id', $productId)
            ->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Item removed from cart.');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    public function update(Request $request, $productId)
    {
        Cart::where('user_id', Auth::id())
            ->where('listing_id', $productId)
            ->update([
                'quantity' => $request->input('quantity')
            ]);

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', 'Cart cleared.');
    }
}