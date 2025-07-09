<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\PortfolioVideoController;
use App\Http\Controllers\AuthController;

// Hapus route '/' karena API tidak perlu view

// Semua endpoint API langsung di-root (tanpa prefix 'api')
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);

Route::apiResource('packages', PackageController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('portfolios', PortfolioController::class);
Route::apiResource('portfolio-images', PortfolioImageController::class);
Route::apiResource('portfolio-videos', PortfolioVideoController::class);
