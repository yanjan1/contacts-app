<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('Auth.login');

Route::post('/login', [AuthController::class, 'loginSubmit'])->name('Auth.login.submit');

Route::get('/', function(Request $req){
    redirect()->route('Auth.login');
});

Route::get('/singup', [AuthController::class, 'signup'])->name('Auth.signup');

Route::post('singup', [AuthController::class, 'signupSubmit'])->name('Auth.signup.submit');



Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('Auth.resetpassword');

Route::post('/reset-password', [AuthController::class, 'resetPasswordSubmit'])->name('Auth.resetpassword.submit');

Route::get('/account-verify', [AuthController::class, 'accountVerify'])->name('Auth.accountverify')->middleware('signed');

