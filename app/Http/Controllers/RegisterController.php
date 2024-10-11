<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:5',
            'username' => 'required|min:3|max:255|unique:users|alpha_dash',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        User::create($validatedData);

        Session::flash('success', 'Registration success! Please login.');

        return redirect('/login');
    }
}
