<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){

        $user = Auth::user();

        return view('profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
    $user = User::find(Auth::id());
    $field = $request->input('field');
    $value = $request->input('value');

    if (in_array($field, ['address', 'birthday', 'phone', 'gender'])) {
        $user->$field = $value;
        $user->save();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 400);
    }

}
