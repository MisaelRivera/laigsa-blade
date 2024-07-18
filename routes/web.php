<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

Route::prefix('/orders')->group(function () {
    Route::get('/', [OrdersController::class, 'index']);
});
