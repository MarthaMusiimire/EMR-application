<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

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

Route::group([], function () {
    Route::resource('user', UserController::class)->names('user');
});


Route::resource('users', UserController::class);

// Routes accessible to unauthenticated users
Route::group(['middleware' => ['web']], function () {
    // Registration Routes
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    // Login Routes
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login');

    // Logout Route
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});


// Routes accessible to authenticated users
Route::group(['middleware' => ['web', 'auth']], function () {
    // User Management Routes
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('inactive_user/inactive', [UserController::class, 'inactive'])->name('users.inactive');
    Route::put('inactive_user/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    
   
});