<?php

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Items\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\Social\SocialLoginController;
use App\Http\Middleware\CheckUserIsActive;
use App\Http\Controllers\LanguageController;


// Home Route
Route::get('/', function () {
    return view('home'); // Adjust to the view you want for your homepage
});


// Dashboard Route (only accessible if logged in, email is verified, and user is active)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', CheckUserIsActive::class])->name('dashboard');

// Publicly Accessible Item Display Routes
Route::get('/items', [ItemController::class, 'index'])->name('items.index'); // Show all items
Route::get('/items/lost', [ItemController::class, 'showLost'])->name('items.lost'); // Show only lost items
Route::get('/items/found', [ItemController::class, 'showFound'])->name('items.found'); // Show only found items
Route::get('/items/category/{category}', [ItemController::class, 'category'])->name('items.category'); // Show items by category
Route::get('/items/category/{category}/subcategory/{subcategory}', [ItemController::class, 'subcategory'])->name('items.subcategory'); // Show items by category and subcategory
Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show'); // View specific item

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




// Check if user is active (applies to routes that require the user to be active)
Route::middleware(['auth', CheckUserIsActive::class])->group(function () {
    // Add other routes here that require the user to be active
});

// Social Login Routes with dynamic provider (google or facebook)
Route::get('auth/redirect/{provider}', [SocialLoginController::class, 'redirect'])->name('social.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('social.callback');

// Route to display the Terms and Conditions page
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// Include Breeze's Authentication Routes
require __DIR__.'/auth.php';



// Routes for Languages
Route::get('lang', [LanguageController::class, 'change'])->name("change.lang");




