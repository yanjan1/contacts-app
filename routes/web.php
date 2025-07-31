<?php

use App\Http\Controllers\{
    MailController,
    LoginController,
    RegisterController,
    ForgotPasswordController,
    ResetPasswordController,
    VerificationController,
    ProfileController,
    DashboardController
};
use Illuminate\Support\Facades\Route;




Route::middleware('guest')->group(function () {
    Route::redirect('/', '/login');

    Route::get('/mails', [MailController::class, 'index'])->name('mails.index')->middleware('throttle:10,1');

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    Route::post('/login', [LoginController::class, 'login'])->name('login.submit')->middleware('throttle:5,1');

    Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');

    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit')->middleware('throttle:5,1');


    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->name('password.email');

    Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    

    // !Todo : to be implemented

    // Email verification routes
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware('signed');

    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');

    Route::post('/email/resend', [VerificationController::class, 'resend'])->
        name('verification.resend');


});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        // contacts entity CRUD routes

    });

});







