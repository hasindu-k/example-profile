<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.submit');
});

// Route::prefix('users')->name('users.')->middleware('role:superAdmin,teacher')

            // Route::get('/', [UsersController::class, 'index'])->name('index');
            // Route::get('/create', [UsersController::class, 'create'])->name('create');
            // Route::post('/store', [UsersController::class, 'store'])->name('store');
            // Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
            // Route::put('/{userId}/update', [UsersController::class, 'update'])->name('update');
            // Route::put('/{userId}/reset-password', [UsersController::class, 'resetPassword'])->name('resetPassword');
