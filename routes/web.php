<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MailController;


Route::middleware('guest')->group(function () {
    Route::get('/mails', [MailController::class, 'index'])->name('mails.index');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');

    Route::post('register', [RegisterController::class, 'register']);


    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Email verification routes

    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->
        name('verification.resend');
    

});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::group(['prefix'=> 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        // contacts entity CRUD routes
        
    });
   
});







