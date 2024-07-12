<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product', function () {
    return 'La liste de produits';
});

Route::get('/customer', function () {
    return 'La liste des clients';
});

Route::get('/customer/{id}', function($id){
    return "Fiche du client $id";

});

// Route pour la fiche détail d'un produit.
Route::get('/product/{id}', function ($id){
    return "Fiche du produit $id";
}

);


Route::get('/Categories', [\App\Http\Controllers\CategoriesController::class, 'show']);

Route::get('/Categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'showId']);
