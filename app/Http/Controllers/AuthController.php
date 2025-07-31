<?php

namespace App\Http\Controllers;

use App\Models\SentMail;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        return view('Auth.login');
    }

    public function loginSubmit(Request $req)
    {

    }


    public function signup(Request $req)
    {
        return view('Auth.signup');
    }

    public function signupSubmit(Request $req)
    {
      

       

    }

    public function resetPassword(Request $req)
    {
        return view('Auth.passwordreset');
    }

    public function resetPasswordSubmit(Request $req)
    {

    }

    public function accountVerify(Request $req)
    {

    }
}
