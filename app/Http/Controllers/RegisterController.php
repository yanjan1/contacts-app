<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\{Hash, Validator, Log};
use Illuminate\Database\QueryException;


class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('Auth.register');
    }

    public function register(Request $req)
    {
          $validator = Validator::make($req->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Not valid input')->withInput();
        }


        try {
            $user = User::create([
                'email' => $req->input('email'),
                'password' => Hash::make($req->input('password')),
                'name' => 'User 1'
            ]);
        } catch (QueryException $qe) {
            return redirect()->back()->with('error', 'Something went Wrong!')->withInput();
        }


        if ($user) {
            try {
                $user->sendEmailVerificationNotification();
            } catch (\Throwable $th) {
                Log::error("Failed to send verification email");
                $user->delete();
                return redirect()->back()->with('error', 'Unable to sign up at this moment. Please try again later.')->withInput();
            }
            return redirect()->back()->with('success', 'Registration successful! Please check your email to verify your account.');
        } else {
            return redirect()->back()->with('error', 'Registration failed! Please try again.')->withInput();
        }
    }

}
