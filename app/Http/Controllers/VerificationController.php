<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Log;
use URL;

class VerificationController extends Controller
{

    public function show()
    {
        return view('Auth.verify-email');
    }




    public function verify(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        Log::info('Email verification attempt', [
            'user_id' => $user->id,
            'email' => $user->email,
            'url' => URL::current(),
        ]);

        Log::info('Verification hash', [
            'hash' => $hash,
            'expected_hash' => $user->getEmailForVerification(),
        ]);

        if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            abort(403, 'Invalid verification link.');
        }


        if ($user->hasVerifiedEmail()) {
            return redirect()->route('login');
        }

        $user->markEmailAsVerified();

        return redirect()->route('login')->with('success', 'Email successfully verified.');
    }



    public function resend(Request $request)
    {
        $validation = $request->validate(['email' => 'required|email', 'exists:users,email']);
        $user = User::where('email', $validation['email'])->first();

        if (!$user || $user->hasVerifiedEmail()) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        } else {
            try {
                $user->sendEmailVerificationNotification();
                return redirect()->back()->with('success', 'Verification link sent to your email.');
            } catch (\Exception $e) {
                Log::error('Email verification resend failed: ' . $e->getMessage(), [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'url' => URL::current(),
                ]);
                return redirect()->back()->with('success', 'Something went wrong.');
            }
        }

    }
}
