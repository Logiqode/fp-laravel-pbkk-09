<?php

namespace App\Http\Controllers;

use App\Models\Storeowner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StoreController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        $storeOwner = Storeowner::where('user_id', $user->id)->first();

        if ($storeOwner) {
            return view('store.index', ['storeOwner' => $storeOwner, 'title' => 'My Store', 'active' => 'store']);
        } else {
            return view('store.nostore', ['title' => 'Create Store', 'active' => 'store']);
        }
    }

    public function create(){
    return view('store.create', ['title' => 'Create Store', 'active' => 'store']);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
        'store_name' => 'required|string|max:255|min:5|unique:storeowners',
        'store_description' => 'required|string|max:1000|min:10',
    ]);
    
    $validatedData['store_slug'] = Str::slug($validatedData['store_name']);
    $validatedData['status'] = 'Pending';
    $validatedData['user_id'] = Auth::id(); 

    Storeowner::create($validatedData);

    Session::flash('createStoreSuccess', 'Store creation request sent! Please wait for approval.');

    return redirect()->route('store.index');
    }  

    public function show($slug)
{
    // Find the storeowner by the store_slug
    $storeOwner = Storeowner::where('store_slug', $slug)->firstOrFail();
    
    // Return the store view with the storeowner data
    return view('store.show', ['storeOwner' => $storeOwner, 'title' => $storeOwner->store_name]);
}
    
}
