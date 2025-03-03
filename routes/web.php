<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');

    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
});

Route::middleware('auth')->get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/upload-photo', [ProfileController::class, 'updateProfilePicture'])->name('profile.upload-photo');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Route::prefix('users')->name('users.')->middleware('role:superAdmin,teacher')

            // Route::get('/', [UsersController::class, 'index'])->name('index');
            // Route::get('/create', [UsersController::class, 'create'])->name('create');
            // Route::post('/store', [UsersController::class, 'store'])->name('store');
            // Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
            // Route::put('/{userId}/update', [UsersController::class, 'update'])->name('update');
            // Route::put('/{userId}/reset-password', [UsersController::class, 'resetPassword'])->name('resetPassword');
