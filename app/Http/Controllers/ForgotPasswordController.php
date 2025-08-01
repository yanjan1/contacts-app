<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('Auth.forget-password');
    }


    public function sendResetLinkEmail(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return back()->with('Sucess', 'If the email is registered, a reset link will be sent to it.');
        } else {
            $status = Password::sendResetLink(
                $req->only('email')
            );
            if ($status !== Password::RESET_LINK_SENT) {
                Log::error('Error sending password reset email: ' . $status);
                return back()->with('error', 'An error occurred while sending the reset link. Please try again later.');
            }else{
                return back()->with('success', 'If the email is registered, a reset link will be sent to it.');
            }
        }
    }


    public function showResetForm(Request $req, $token, $payload)
    {
        if (!$token || !$payload) {
            abort(403, 'Invalid Request');
        } else {
            $email = decrypt($payload);
            $user = User::where('email', $email)->first();

            if (!$user) {
                abort(404, 'User not found');
            } else if (Password::tokenExists(User::where('email', decrypt($payload))->first(), $token) === false) {
                abort(403, 'Invalid or expired token');
            } else {
                return view('Auth.reset-password', [
                    'token' => $token,
                    'email' => $email,
                ]);
            }
        }
    }


    public function reset(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $status = Password::reset(
            $req->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Password has been reset successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Failed to reset password. Please try again.'); 
        }
    }
}
