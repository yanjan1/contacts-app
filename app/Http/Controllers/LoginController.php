<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLoginForm(Request $req)
    {
        return view('Auth.login');
    }

    public function login(Request $req)
    {
        $cred = $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $remember = $req->has('remember') ? true : false;

        if (Auth::attempt($cred, $remember)) {
            return redirect()->route('dashboard.index')->with('status', 'Login successful.');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }
    }


    public function logoutshow(Request $req)
    {
        return view(view: 'Auth.logout', data: [
            'user' => Auth::user()
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
