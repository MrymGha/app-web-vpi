<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



 Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard')->name('dashboard');
 });
 



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Admin routes for managing brands
    Route::resource('brands', BrandController::class)->except(['show']);

    // Admin routes for managing categories
    Route::resource('categories', CategoryController::class)->except(['show']);

    // Admin routes for managing products
    Route::resource('products', ProductController::class)->except(['show']);
});

require __DIR__.'/auth.php';
