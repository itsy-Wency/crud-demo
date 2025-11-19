<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

// ---------------------------
// Protected Admin Routes
// ---------------------------
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// ---------------------------
// Public Product CRUD Routes (Optional)
// ---------------------------
Route::resource('products', ProductController::class);

// ---------------------------
// Authentication / Email Verification
// ---------------------------
require __DIR__.'/auth.php';
