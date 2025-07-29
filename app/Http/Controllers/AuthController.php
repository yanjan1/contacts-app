<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $req){
        return view('Auth.login');
    }

    public function loginSubmit(Request $req){

    }


    public function signup(Request $req){
        return view('Auth.signup');
    }

    public function signupSubmit(Request $req){

    }

    public function resetPassword(Request $req){
        return view('Auth.passwordreset');
    }

    public function resetPasswordSubmit(Request $req){

    }

    public function accountVerify(Request $req){

    }
}
