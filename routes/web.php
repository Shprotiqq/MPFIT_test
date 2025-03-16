<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Order\OrderController;


Route::view('/', 'index')->name('home');

Route::resource('products', ProductController::class);

Route::resource('orders', OrderController::class);