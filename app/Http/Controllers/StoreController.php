<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use App\Models\Category;
use App\Models\Storeowner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $storeOwner = Storeowner::where('user_id', $user->id)->first();

        if ($storeOwner) {
            $storeItems = Listing::where('storeowner_id', $storeOwner->id)->get();
            // dd($storeItems);
            return view('store.show', [
                'storeOwner' => $storeOwner,
                'storeItems' => $storeItems,
                'title' => $storeOwner->store_name
            ]);
        } else {
            return view('store.nostore', ['title' => 'Create Store', 'active' => 'store']);
        }
    }

    public function create()
    {
        return view('store.create', ['title' => 'Request Store', 'active' => 'storeListing']);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'store_name' => 'required|string|max:255|min:5|unique:storeowners',
            'store_description' => 'required|string|max:1000|min:10',
        ]);

        $validatedData['store_slug'] = Str::slug($validatedData['store_name']);
        $validatedData['status'] = 'Pending';
        $validatedData['user_id'] = Auth::id();

        // Create the store owner
        $storeOwner = Storeowner::create($validatedData);

        // Update the user's is_storeowner status
        $user = User::find(Auth::id());
        if ($user) {
            $user->is_storeowner = 1;
            $user->save(); // This should work now
        };

        Session::flash('createStoreSuccess', 'Store creation request sent! Please wait for approval.');

        return redirect()->route('store.show', $validatedData['store_slug']);
    }


    public function show($slug)
    {
        // Find the storeowner by the store_slug
        $storeOwner = Storeowner::where('store_slug', $slug)->firstOrFail();
        $storeItems = Listing::where('storeowner_id', $storeOwner->id)->get();

        // Check if each item is in the user's wishlist
        $user = Auth::user();
        $wishlistItems = $user->wishlist->pluck('id')->toArray();
        foreach ($storeItems as $item) {
            $item->is_in_wishlist = in_array($item->id, $wishlistItems);
        }



        // Return the store view with the storeowner data
        return view('store.show', [
            'storeOwner' => $storeOwner,
            'storeItems' => $storeItems,
            'title' => $storeOwner->store_name
        ]);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add a listing.');
        }

        $storeOwner = Storeowner::where('user_id', $user->id)->first();

        $listing_id = $request->query('listing_id');
        $categories = Category::all();

        if ($listing_id) {
            $listing = Listing::find($listing_id);
            // dd($listing);
            if ($listing) {
                return view('store.add', ['title' => 'Edit Listing', 'listing' => $listing, 'active' => 'storeListing', 'categories' => $categories]);
            }
        }

        if (!$storeOwner) {
            return redirect()->route('store.nostore')->with('error', 'You need to create a store first.');
        }
        return view('store.add', ['title' => 'Add Listing', 'categories' => $categories, 'active' => 'storeListing']);
    }

    public function storeListing(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:1000|min:10',
            'price' => ['required', 'numeric', 'min:0.1', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add a listing.');
        }

        $storeOwner = Storeowner::where('user_id', $user->id)->first();

        if (!$storeOwner) {
            return redirect()->route('store.nostore')->with('error', 'You need to create a store first.');
        }

        // Format the price to ensure it has a maximum of 2 decimal places
        $validatedData['price'] = number_format($validatedData['price'], 2, '.', '');
        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['storeowner_id'] = $storeOwner->id;

        Listing::create($validatedData);

        Session::flash('addListingSuccess', 'Listing added successfully!');

        return redirect()->route('store.show', $storeOwner->store_slug);
    }

    public function updateListing(Request $request, $listing_id)
    {
        // dd($listing_id); // Cek nilai listing_id yang diterima dari URL

        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|min:5',
            'description' => 'required|string|max:1000|min:10',
            'price' => ['required', 'numeric', 'min:0.1', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        // Pastikan user sudah login
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to update the listing.');
        }

        // Pastikan store owner sudah ada
        $storeOwner = Storeowner::where('user_id', $user->id)->first();
        if (!$storeOwner) {
            return redirect()->route('store.nostore')->with('error', 'You need to create a store first.');
        }

        // Ambil listing berdasarkan ID dan pastikan listing milik user yang sedang login
        $listing = Listing::where('id', $listing_id)->where('storeowner_id', $storeOwner->id)->first();
        if (!$listing) {
            return redirect()->route('store.show', $storeOwner->store_slug)->with('error', 'Listing not found or you do not have permission to update this listing.');
        }

        // Format harga agar memiliki maksimal 2 angka desimal
        $validatedData['price'] = number_format($validatedData['price'], 2, '.', '');

        // Update slug jika nama listing berubah
        $validatedData['slug'] = Str::slug($validatedData['name']);

        // Cek data yang akan diupdate
        // dd($validatedData); // Pastikan data sudah benar sebelum update

        // Update listing dengan data yang telah divalidasi
        $listing->update($validatedData);

        // Set pesan sukses
        Session::flash('updateListingSuccess', 'Listing updated successfully!');

        // Redirect ke halaman store
        return redirect()->route('store.show', $storeOwner->store_slug);
    }
}
