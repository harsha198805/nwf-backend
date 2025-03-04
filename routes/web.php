<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;

Route::get('/login', function () {
    return redirect()->route('login');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

// Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/products', 'index')->name('products.index');
        Route::get('/products/create', 'create')->name('products.create');
        Route::post('/products', 'store')->name('products.store');
        Route::get('/products/edit/{product}', 'edit')->name('products.edit');
        Route::post('/products/{product}', 'update')->name('products.update');
        Route::delete('/products/{product}', 'destroy')->name('products.destroy');
        Route::get('/products/search', 'search')->name('products.search');
        Route::get('/products/getdata', 'getdata')->name('products.getdata');
        Route::get('/category_list', 'getCategoryList');
        Route::post('/add_new_category', 'addNewCategory');
        Route::patch('/products/update-status', 'updateStatus')->name('products.updateStatus');
    });


    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::get('/categories/show/{category}', 'show')->name('categories.show');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/edit/{category}', 'edit')->name('categories.edit');
        Route::post('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
        Route::get('/categories/search', 'search')->name('categories.search');
        Route::get('/categories/getdata', 'getdata')->name('categories.getdata');
        Route::patch('/categories/update-status', 'updateStatus')->name('categories.updateStatus');
    });

    Route::controller(BlogController::class)->group(function () {
        Route::get('/blogs', 'index')->name('blogs.index');
        Route::get('/blogs/create', 'create')->name('blogs.create');
        Route::post('/blogs', 'store')->name('blogs.store');
        Route::get('/blogs/edit/{blog}', 'edit')->name('blogs.edit');
        Route::post('/blogs/{blog}', 'update')->name('blogs.update');
        Route::delete('/blogs/{blog}', 'destroy')->name('blogs.destroy');
        Route::get('/blogs/search', 'search')->name('blogs.search');
        Route::get('/blogs/getdata', 'getdata')->name('blogs.getdata');
        Route::patch('/blogs/update-status', 'updateStatus')->name('blogs.updateStatus');
    });
});
