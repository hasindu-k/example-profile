<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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
Route::middleware('auth')->post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/upload-photo', [ProfileController::class, 'updateProfilePicture'])->name('profile.upload-photo');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/students/store', [StudentController::class, 'store'])->name('students.store');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::get('download-file', [DownloadFileController::class, 'downloadFile'])->name('download-file');

Route::fallback(function () {
    return view('not-found');
});

// Route::prefix('users')->name('users.')->middleware('role:superAdmin,teacher')

            // Route::get('/', [UsersController::class, 'index'])->name('index');
            // Route::get('/create', [UsersController::class, 'create'])->name('create');
            // Route::post('/store', [UsersController::class, 'store'])->name('store');
            // Route::get('/{id}/edit', [UsersController::class, 'edit'])->name('edit');
            // Route::put('/{userId}/update', [UsersController::class, 'update'])->name('update');
            // Route::put('/{userId}/reset-password', [UsersController::class, 'resetPassword'])->name('resetPassword');
