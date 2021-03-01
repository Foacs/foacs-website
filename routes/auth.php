<?php

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])
	->middleware('guest')->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])
	->middleware('guest')->name('auth.authenticate');

Route::get('/register', [AuthController::class, 'register'])
	->middleware('guest')->name('auth.register');
Route::post('/register', [AuthController::class, 'create'])
	->middleware('guest')->name('auth.create');

// Change password
Route::get('/change-password/{user}', [AuthController::class, 'passwordChange'])
	->middleware(['auth', 'can:changePassword,user'])->name('password.change');
Route::post('/change-password/{user}', [AuthController::class, 'passwordChangeStore'])
	->middleware(['auth', 'can:changePassword,user'])->name('password.change.store');

// Ask for reset password 
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])
	->middleware('guest')->name('password.forgot');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordStore'])
	->middleware('guest')->name('password.forgot.store');

// Reset password
Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])
	->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'passwordResetStore'])
	->middleware('guest')->name('password.reset.store');

// Verify email
Route::get('/verify-email', [AuthController::class, 'emailVerify'])
	->middleware('auth')->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'emailVerifyStore'])
	->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
// Resend email
Route::post('/email/verification-notification', [AuthController::class, 'verificationNotification'])
	->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/logout', [AuthController::class, 'logout'])
	->middleware('auth')->name('auth.logout');

Route::get('/login/github', function () {
	return Socialite::driver('github')->redirect();
})
	->name('auth.github.login');

Route::get('/login/github/callback', [AuthController::class, 'handleGithubCallback'])
	->name('auth.github.callback');