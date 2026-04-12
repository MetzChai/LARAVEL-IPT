<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryControllerController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

Route::resource('products', ProductController::class);