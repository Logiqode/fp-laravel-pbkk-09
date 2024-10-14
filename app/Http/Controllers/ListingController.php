<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Category;
use App\Models\Wishlist; // Tambahkan model Wishlist
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Listing::query();

        // Apply search filter
        if (request('search')) {
            $searchTerms = explode(' ', request('search'));
            foreach ($searchTerms as $term) {
                $query->where('name', 'like', '%' . $term . '%');
            }
        }

        // Apply category filter
        if ($request->has('category')) {
            // Filter listings based on selected categories
            $query->whereHas('category', function ($categoryQuery) use ($request) {
                $categoryQuery->whereIn('slug', $request->input('category'));
            });
        }

        // Get collection first
        $listingsCollection = $query->get();

        // Ambil wishlist untuk user yang sedang login
        $wishlistProductIds = Wishlist::where('user_id', Auth::id())->pluck('listing_id')->toArray();

        // Loop listings untuk cek apakah ada di wishlist
        $listingsCollection->each(function ($listing) use ($wishlistProductIds) {
            $listing->is_in_wishlist = in_array($listing->id, $wishlistProductIds);
        });

        // Manually paginate collection
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 28;
        $currentPageItems = $listingsCollection->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedListings = new LengthAwarePaginator($currentPageItems, $listingsCollection->count(), $perPage, $currentPage);

        // Set path untuk pagination
        $paginatedListings->setPath('/listings');

        dump($paginatedListings);

        return view('listings', [
            'title' => 'Listings',
            'listings' => $paginatedListings,
            'categories' => $categories,
            'user_id' => Auth::id(),
        ]);
    }

    public function show(Listing $listing) // Automatically resolves based on slug
    {
        // Check if the listing is in the user's wishlist
        $isInWishlist = Wishlist::where('user_id', Auth::id())
            ->where('listing_id', $listing->id) // Use the listing's ID
            ->exists();

        $listing->is_in_wishlist = $isInWishlist;

        return view('listing', [
            'title' => 'Listing Details',
            'listing' => $listing,
            'user_id' => Auth::id(),
        ]);
    }
}
