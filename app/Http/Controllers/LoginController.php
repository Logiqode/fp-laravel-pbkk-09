<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Session::flash('loginError', 'Incorrect email or password.');
        return back();
    }

    public function logout(){
        Auth::logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/');
    }

    public function showForgotPasswordForm()
    {
        return view('login.forgot-password', [
            'title' => 'Forgot Password'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::flash('resetSuccess', 'Password successfully reset! Please login with your new password.');

        return redirect()->route('login')->with('status', 'Password successfully updated.');
    }
}
