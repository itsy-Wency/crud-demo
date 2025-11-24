<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginRedirectController;

// Default page → Registration
Route::get('/', function () {
    return redirect()->route('register');
});

// Dashboard redirect based on role
Route::get('/home', [LoginRedirectController::class, 'redirect'])
    ->middleware('auth')
    ->name('home');

// Admin routes
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});

// Product CRUD (public but mostly for users)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('products', ProductController::class);
});

// Breeze Auth routes
require __DIR__.'/auth.php';
