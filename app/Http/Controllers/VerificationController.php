<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use URL;

class VerificationController extends Controller
{

    public function show(){
        return view('Auth.verify-email');
    }




   public function verify(Request $request, $id, $hash)
    {
       $user = User::findOrFail($id);
       
        if (!hash_equals((string) $user->getEmailForVerification(), (string) $hash)) {
            abort(403, 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login')->with('status', 'Email already verified.');
        }

        $user->markEmailAsVerified();

        return redirect()->route('login')->with('status', 'Email successfully verified.');
    }

    

    public function resend(Request $request)
    {
        // Logic for resending the verification email
    }
}
