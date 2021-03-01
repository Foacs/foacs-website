<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ContactController;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Project;

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

Route::view('/about', 'about', ['active' => 'about'])
    ->name('about');
    
Route::view('/eula', 'eula', ['active' => ''])
    ->name('eula');

Route::view('/contact', 'contact', ['active' => ''])
    ->name('contact');
Route::post('/contact', [ContactController::class, 'contact'])
    ->name('contact.send');

Route::get('/projects', [ProjectController::class, 'index'])
    ->name('projects.index');
Route::get('/projects/show/{project}', [ProjectController::class, 'show'])
    ->name('projects.show');
Route::get('/projects/edit/{project}', [ProjectController::class, 'edit'])
    ->middleware(['auth', 'verified', 'can:update,project'])->name('projects.edit');
Route::post('/projects/edit/{project}', [ProjectController::class, 'editStore'])
    ->middleware(['auth', 'verified', 'can:update,project'])->name('projects.edit.store');
Route::get('/projects/delete/{project}', [ProjectController::class, 'delete'])
    ->middleware(['auth', 'verified', 'can:delete,project'])->name('projects.delete');
Route::get('/projects/create', [ProjectController::class, 'create'])
    ->name('projects.create');
Route::post('/projects/create', [ProjectController::class, 'createStore'])
    ->middleware(['auth', 'verified', 'can:create,App\Models\Project'])->name('projects.create.store');
Route::get('/projects/restore/{project}', [ProjectController::class, 'restore'])
    ->middleware(['auth', 'verified', 'can:restore,project'])->name('projects.restore');
Route::post('/projects/contributor/{project}', [ProjectController::class, 'addContributor'])
    ->middleware(['auth', 'verified', 'can:addContributor,project'])->name('projects.create.contributor');
Route::get('/projects/contributor/{project}-{user}', [ProjectController::class, 'removeContributor'])
    ->middleware(['auth', 'verified', 'can:removeContributor,project'])->name('projects.remove.contributor');

Route::get('/users', [UserController::class, 'index'])
    ->name('profile.index');
Route::get('/users/{id}', [UserController::class, 'profile'])
    ->name('profile.show');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])
    ->middleware(['auth', 'verified', 'can:update,user'])->name('profile.edit');
Route::post('/users/edit/{user}', [UserController::class, 'save'])
    ->middleware(['auth', 'verified', 'can:update,user'])->name('profile.save');
Route::get('/users/delete/{user}', [UserController::class, 'delete'])
    ->middleware(['auth', 'verified', 'can:delete,user'])->name('profile.delete');

Route::post('/tokens/create', [TokenController::class, 'createToken'])
    ->middleware(['auth', 'verified'])->name('token.create');
Route::post('/tokens/delete', [TokenController::class, 'deleteToken'])
    ->middleware(['auth', 'verified'])->name('token.delete');    

require __DIR__.'/auth.php';