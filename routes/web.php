<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

    //Admin Categories Page
    Route::get('/read_category', [CategoryController::class, 'read_category'])->name('read_category');
    Route::get('/add_category', [CategoryController::class, 'add_category'])->name('add_category');
    Route::post('/create_category', [CategoryController::class, 'create_category'])->name('create_category');
    Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
    Route::post('/update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::get('/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

        //Admin Products Page
    Route::get('/read_product', [ProductController::class, 'read_product'])->name('read_product');
    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');
    Route::post('/create_product', [ProductController::class, 'create_product'])->name('create_product');
    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::post('/update_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
    Route::get('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');

});

require __DIR__.'/auth.php';
