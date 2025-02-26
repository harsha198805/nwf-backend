<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});
   
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });
    Route::middleware(['auth', 'user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    });

   // Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::middleware(['auth'])->group(function () {
        Route::controller(ProductController::class)->group(function(){
            Route::get('/products','index')->name('products.index');
            Route::get('/products/create','create')->name('products.create');
            Route::get('/products/show/{product}','show')->name('products.show');
            Route::post('/products','store')->name('products.store');
            Route::get('/products/edit/{product}','edit')->name('products.edit');
            Route::post('/products/{product}','update')->name('products.update');
            Route::delete('/products/{product}','destroy')->name('products.destroy');
            Route::get('/products/search', 'search')->name('products.search');
            Route::get('/products/getdata', 'getdata')->name('products.getdata');    
            Route::get('/category_list', 'getCategoryList');
            Route::post('/add_new_category', 'addNewCategory');
            Route::patch('/products/update-status', 'updateStatus')->name('products.updateStatus');
        });
    });
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/categories','index')->name('categories.index');
            Route::get('/categories/create','create')->name('categories.create');
            Route::get('/categories/show/{category}','show')->name('categories.show');
            Route::post('/categories','store')->name('categories.store');
            Route::get('/categories/edit/{category}','edit')->name('categories.edit');
            Route::post('/categories/{category}','update')->name('categories.update');
            Route::delete('/categories/{category}','destroy')->name('categories.destroy');    
            Route::get('/categories/search', 'search')->name('categories.search');
            Route::get('/categories/getdata', 'getdata')->name('categories.getdata');
            Route::patch('/categories/update-status', 'updateStatus')->name('categories.updateStatus');
        });
    });
