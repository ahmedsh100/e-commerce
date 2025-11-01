<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', [HomeController::class, 'Premium'])->name('dashboard')->middleware(['auth', 'verified']);


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Admin Route
    Route::get('/read_category', [CategoryController::class, 'read_category'])->name('read_category');
    Route::post('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
    Route::post('/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
});

require __DIR__.'/auth.php';
