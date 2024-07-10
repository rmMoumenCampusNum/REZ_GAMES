<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route pour la fiche détail d'un produit
Route::get('/product/{id}', function ($id){
    return "Fiche du produit $id";
}

);
