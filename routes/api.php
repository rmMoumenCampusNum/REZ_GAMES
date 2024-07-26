<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Route CRUD Items / Johan
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [ItemController::class, 'show']);
Route::post('/items', [ItemController::class, 'store']);
Route::post('/items/{id}', [ItemController::class, 'update']);
Route::put('/items/{id}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'destroy']);
Route::apiResource('items', ItemController::class);
//Routes Auth //Johan
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/post{id}', [PostController::class, 'show']);
// Admin routes //Johan
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('Admin', PostController::class);
});

    // Routes User
    Route::get('/users', [UserController::class, 'showAll']);
    Route::get('/users/{id}', [UserController::class, 'showOne']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);
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
    Route::post('/orders', [OrdersController::class, 'store']);
    Route::delete('/orders/{id}', [OrdersController::class, 'destroy']);
    Route::put('/orders/{id}', [OrdersController::class, 'update']);

    // Routes Shipments
    Route::get('/shipments', [ShipmentController::class, 'showAll']);
    Route::get('/shipments/{id}', [ShipmentController::class, 'showOne']);
    Route::delete('/shipments/{id}', [ShipmentController::class, 'destroy']);
    Route::post('/shipments', [ShipmentController::class, 'store']);
    Route::put('/shipments/{id}', [ShipmentController::class, 'update']);

    // Route Categories
    Route::apiResource('categories', CategoriesController::class);

    // Route Items
    Route::apiResource('items', ItemController::class);

    Route::get('/card/{id}', function ($id){
        return "Card $id";
    });
});
