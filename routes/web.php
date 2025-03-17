<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'index')->name('home');

Route::prefix('products')->name('products.')->group(function () {
   Route::get('/', \App\Http\Controllers\Product\IndexController::class)->name('index');

    Route::get('/create', \App\Http\Controllers\Product\CreateController::class)->name('create');

    Route::post('/store', \App\Http\Controllers\Product\StoreController::class)->name('store');

    Route::get('/{product}', \App\Http\Controllers\Product\ShowController::class)->name('show');

    Route::get('/{product}/edit', \App\Http\Controllers\Product\EditController::class)->name('edit');

    Route::put('/{product}', \App\Http\Controllers\Product\UpdateController::class)->name('update');

    Route::delete('/{product}', \App\Http\Controllers\Product\DeleteController::class)->name('delete');
});

Route::prefix('order')->name('orders.')->group(function () {
    Route::get('/', \App\Http\Controllers\Order\IndexController::class)->name('index');

    Route::get('/create', \App\Http\Controllers\Order\CreateController::class)->name('create');

    Route::post('/store', \App\Http\Controllers\Order\StoreController::class)->name('store');

    Route::get('/{order}', \App\Http\Controllers\Order\ShowController::class)->name('show');

    Route::get('/{order}/edit', \App\Http\Controllers\Order\EditController::class)->name('edit');

    Route::put('/{order}', \App\Http\Controllers\Order\UpdateController::class)->name('update');

    Route::delete('/{order}', \App\Http\Controllers\Order\DeleteController::class)->name('delete');
});