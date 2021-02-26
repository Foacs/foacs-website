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

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])
	->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordStore'])
	->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'passwordReset'])
	->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'passwordUpdate'])
	->middleware('guest')->name('password.update');

Route::get('/verify-email', [AuthController::class, 'emailVerify'])
	->middleware('auth')->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'emailVerifyStore'])
	->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

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