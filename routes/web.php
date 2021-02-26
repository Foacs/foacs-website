<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TokenController;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome', ['active' => 'home'])
    ->name('home');

Route::view('/about', 'about', ['active' => 'about', 'member_count' => User::count()])
    ->name('about');

Route::view('/contact', 'contact', ['active' => ''])
    ->name('contact');

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])
    ->name('projects.show');

Route::get('/users', [UserController::class, 'index'])
    ->name('profile.index');
Route::get('/users/{id}', [UserController::class, 'profile'])
    ->name('profile.show');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])
    ->middleware('auth')->name('profile.edit');

Route::post('/tokens/create', [TokenController::class, 'createToken'])
    ->middleware('auth')->name('token.create');
Route::post('/tokens/delete', [TokenController::class, 'deleteToken'])
    ->middleware('auth')->name('token.delete');    

require __DIR__.'/auth.php';