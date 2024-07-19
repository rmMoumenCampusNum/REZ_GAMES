<?php
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
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

// Routes User
Route::get('/user', [UserController::class, 'showAll']);
Route::get('/user/{id}', [UserController::class, 'showOne']);

// Routes Orders
Route::get('/orders', [OrdersController::class, 'showAllOrders']);
Route::get('/orders/{id}', [OrdersController::class, 'showOneOrder']);

// Routes Shipments
Route::get('/shipments', function () {
    return "La liste des envoi";
});

Route::get('/shipments/{id}', function ($id) {
    return "Fiche de l'envoi $id";
});

// Route Categories
Route::apiResource('categories', CategoriesController::class);

// Route Cards
Route::get('/card/{id}', function ($id){
    return "Card $id";
});


