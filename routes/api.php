<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route Items / Johan
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::post('/items', [ItemController::class, 'store']);
Route::post('/items/{id}', [ItemController::class, 'update']);
Route::put('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);
Route::apiResource('items', ItemController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource("users", UserController::class);
});

//assignation du controleur pour la route user, avec comme texte d'affichage si ok return ['Tableau' => 'La liste des clients'];
Route::get('/user', [UserController::class, 'showAll']);

// assignation du controleur pour la route user$id, avec comme texte d'affichage si ok ""User controller Ok with $id";
Route::get('/user/{id}', [UserController::class, 'showOne']);
Route::delete('user/d{id}', [UserController::class, 'destroy']);
Route::post('/user/create', [UserController::class, 'store']);
Route::put('/user/edit/{id}', [UserController::class, 'update']);

// Routes Orders
Route::get('/orders', [OrdersController::class, 'showAllOrders']);
Route::get('/orders/{id}', [OrdersController::class, 'showOneOrder']);
Route::get('/orders', [OrdersController::class, 'showAllOrders']);
Route::post('/orders', [OrdersController::class, 'store']); // Créer une commande
Route::delete('/orders/{id}', [OrdersController::class, 'destroy']); // Supprimer une commande
Route::put('/orders/{id}', [OrdersController::class, 'update']);

Route::get('/shipment', [ShipmentController::class, 'showAll']);
Route::get('/shipment/{id}', [ShipmentController::class, 'showOne']);
Route::delete('shipment/d{id}', [ShipmentController::class, 'destroy']);
Route::post('/shipment/create', [ShipmentController::class, 'store']);
Route::put('/shipment/edit/{id}', [ShipmentController::class, 'update']);

// Route Categories
Route::apiResource('categories', CategoriesController::class);
Route::apiResource('items', ItemController::class);

Route::get('/card/{id}', function ($id) {
    return "Card $id";
});


