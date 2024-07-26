<?php

use Illuminate\Support\Facades\Route;

// Importation des contrôleurs nécessaires
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Routes de connexion et d'inscription
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Afficher le formulaire de connexion
Route::post('/login', [AuthController::class, 'login']); // Traiter la connexion de l'utilisateur
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register'); // Afficher le formulaire d'inscription
Route::post('/register', [AuthController::class, 'register']); // Traiter l'inscription de l'utilisateur
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum'); // Déconnexion de l'utilisateur, protégée par le middleware Sanctum

Route::view('/', 'welcome');
// Routes protégées par l'authentification Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); // Page d'accueil du tableau de bord

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    // Routes User
    Route::resource('users', UserController::class); // Routes RESTful pour la gestion des utilisateurs

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
    // Routes Orders
    Route::resource('orders', OrdersController::class); // Routes RESTful pour la gestion des commandes

Route::view('/Items','Items' );
Route::view('/index', 'index');
    // Routes Shipments
    Route::resource('shipments', ShipmentController::class); // Routes RESTful pour la gestion des envois

    // Route Categories
    Route::resource('categories', CategoriesController::class); // Routes RESTful pour la gestion des catégories

    // Route Items
    Route::resource('items', ItemController::class); // Routes RESTful pour la gestion des items
});


require __DIR__ . '/auth.php';
// Route de test de session
Route::get('/session-test', function () {
    session(['key' => 'value']); // Enregistrer une clé de session avec une valeur
    return session('key'); // Retourner la valeur de la clé de session
});
