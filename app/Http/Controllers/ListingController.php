<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;

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

        $listings = $query->paginate(28);

        return view('listings', [
            'title' => 'Listings',
            'listings' => $listings,
            'categories' => $categories
        ]);
    }
}
