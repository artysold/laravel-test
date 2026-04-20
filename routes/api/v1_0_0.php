<?php

use App\Http\Controllers\Api\V1_0_0\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('products')
    ->name('products/')
    ->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });
