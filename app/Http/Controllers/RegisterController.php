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
            'username' => 'required|min:3|max:32|unique:users|alpha_dash|not_in:Admin,admin,Root,root,Super,super,User,user,Username,username,Email,email,Login,login,Register,register,Logout,logout,Settings,settings,Profile,profile,Dashboard,dashboard,Notifications,notifications,Wishlist,wishlist,Store,store,Listing,listing,Product,product,Products,products,Category,category,Categories,categories,Tag,tag,Tags,tags,Tagged,tagged,Tagging,tagging,Taggings,taggings,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,taggables,Tagged,tagged,Tagger,tagger,Taggers,taggers,Tagged,tagged,Taggable,taggable,Taggables,tag',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        User::create($validatedData);

        Session::flash('registerSuccess', 'Registration success! Please login.');

        return redirect('/login');
    }
}
