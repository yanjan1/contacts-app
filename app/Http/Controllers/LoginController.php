<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function showLoginForm(Request $req)
    {
        return view('Auth.login');
    }

}
