<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\PortfolioVideoController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    Route::apiResource('packages', PackageController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('portfolios', PortfolioController::class);
    Route::apiResource('portfolio-images', PortfolioImageController::class);
    Route::apiResource('portfolio-videos', PortfolioVideoController::class);
});
