<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;


// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Route CRUD Items
Route::apiResource('items', ItemController::class);

// Routes Auth
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Routes Admin
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('admin/posts', PostController::class);
});

// Routes User
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class);
});

// Routes Orders
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', OrdersController::class);
});

// Routes Shipments
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('shipments', ShipmentController::class);
});

// Routes Categories
Route::apiResource('categories', CategoriesController::class);

// Test routes
Route::get('/card/{id}', function ($id) {
    return "Card $id";
});
