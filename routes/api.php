<?php
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route pour récupérer le cookie CSRF
Route::get('sanctum/csrf-cookie', function (Request $request) {
    return response()->json(['message' => 'CSRF cookie set']);
});

// Routes publiques
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées par l'authentification
//Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Routes User
    Route::get('/users', [UserController::class, 'showAll']);
    Route::get('/users/{id}', [UserController::class, 'showOne']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{id}', [UserController::class, 'update']);

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
//});
