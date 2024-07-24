<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

// Routes de connexion et d'inscription
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

// Routes protégées par l'authentification Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', function () {
        return view('layouts/dashboard');
    })->name('dashboard');

    // Routes User
    Route::resource('users', UserController::class);

    // Routes Orders
    Route::resource('orders', OrdersController::class);

    // Routes Shipments
    Route::resource('shipments', ShipmentController::class);

    // Route Categories
    Route::resource('categories', CategoriesController::class);

    // Route Items
    Route::resource('items', ItemController::class);
});

Route::get('/session-test', function () {
    session(['key' => 'value']);
    return session('key');
});
