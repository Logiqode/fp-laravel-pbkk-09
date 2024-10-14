<?php

namespace App\Http\Controllers;

use App\Models\Storeowner;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pendingStores = Storeowner::where('status', 'Pending')->get();
        $verifiedStores = Storeowner::where('status', 'Verified')->get();
        $suspendedStores = Storeowner::where('status', 'Suspended')->get();

        return view('admin.index',['title' => 'Admin Panel'] , compact('pendingStores', 'verifiedStores', 'suspendedStores'));
    }

    public function suspendStore($id)
    {
        $store = Storeowner::findOrFail($id);
        $store->status = 'Suspended';
        $store->save();

        return redirect()->back()->with('success', 'Store has been suspended.');
    }

    public function verifyStore($id)
    {
        $store = Storeowner::findOrFail($id);
        $store->status = 'Verified';
        $store->save();

        return redirect()->back()->with('success', 'Store has been verified.');
    }

    public function removeStore($id)
    {
        Storeowner::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Store has been removed.');
    }
}

