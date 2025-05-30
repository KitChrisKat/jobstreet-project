<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerControllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\LoginController;
// Authentication Routes
Auth::routes();
require __DIR__ . '/auth.php';

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisteredUserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Dashboard Route (Requires Authentication)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:applicant,employer', 'verified'])->name('dashboard');

// Profile Routes (Requires Authentication)
Route::middleware('auth:applicant,employer')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/employers', [UserController::class, 'employers']);
});

// Email Verification Route
Route::get('/email/verify/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'auth:applicant,employer'])
    ->name('verification.verify');
