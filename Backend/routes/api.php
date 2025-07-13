<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\PortfolioVideoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/orders-per-month', [\App\Http\Controllers\OrderController::class, 'ordersPerMonth']);
Route::get('/dashboard-stats', [\App\Http\Controllers\OrderController::class, 'dashboardStats']);
Route::middleware('auth:api')->get('/me', function (Request $request) {
    return $request->user();
});
