<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\AuthController;

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('user.auth.showRegistrationForm');
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('user.auth.showLoginForm');
    Route::post('registerUser', [AuthController::class, 'registerUser'])->name('user.auth.registerUser');
    Route::post('loginUser', [AuthController::class, 'loginUser'])->name('user.auth.loginUser');
});

Route::middleware('auth')->group(function () {
    Route::post('logoutUser', [AuthController::class, 'logoutUser'])->name('user.auth.logoutUser');
});


