<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

// Home Route
Route::get('/', function () {
    return view('home'); // Adjust to the view you want for your homepage
});

// Dashboard Route (only accessible if logged in and email is verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Item Display Routes
Route::get('/items', [ItemController::class, 'index'])->name('items.index'); // Show all items
Route::get('/items/lost', [ItemController::class, 'showLost'])->name('items.lost'); // Show only lost items
Route::get('/items/found', [ItemController::class, 'showFound'])->name('items.found'); // Show only found items
Route::get('/items/category/{category}', [ItemController::class, 'category'])->name('items.category'); // Show items by category
Route::get('/items/category/{category}/subcategory/{subcategory}', [ItemController::class, 'subcategory'])->name('items.subcategory'); // Show items by category and subcategory

// Authenticated and Verified Group (for Profile routes)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin-Only Routes
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Add other admin routes here as needed
});

// Moderator-Only Routes
Route::middleware(['auth', RoleMiddleware::class . ':moderator'])->group(function () {
    Route::get('/moderator', function () {
        return view('moderator.dashboard');
    })->name('moderator.dashboard');
    // Add other moderator routes here as needed
});

// Include Breeze's Authentication Routes
require __DIR__.'/auth.php';
