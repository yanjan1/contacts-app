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


    public function singup(Request $req){

    }

    public function singupSubmit(Request $req){

    }

    public function resetPassword(Request $req){

    }

    public function resetPasswordSubmit(Request $req){

    }

    public function accountVerify(Request $req){

    }
}
