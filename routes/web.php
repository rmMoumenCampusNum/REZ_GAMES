<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// route pour la liste des produits et les détails d'un produit.
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);


Route::get('/customer', function () {
    return ['Tableau' => 'La liste des clients'];
});

Route::get('/customer/{id}', function ($id) {
    return "Fiche du client $id";

});

// Route pour la fiche détail d'un produit
Route::get('/product/{id}', function ($id) {
    return "Fiche du produit $id";
}

);
