<?php

use App\Http\Controllers\OrdersConroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/product', function () {
    return 'La liste de produits';
});


Route::get('/customer', function () {
    return ['Tableau' => 'La liste des clients'];
});

Route::get('/customer/{id}', function($id){
    return "Fiche du client $id";

});

// Route pour la fiche détail d'un produit
Route::get('/product/{id}', function ($id){
    return "Fiche du produit $id";
}

);

Route::get('/orders', [OrdersConroller::class, 'orders']);

Route::get('/orders/{id}', function ($id){
    return "Fiche du commande id $id";
});

Route::get('/shipments', function (){
    return "La liste des envoi";
});

Route::get('/shipments/{id}', function ($id){
    return "Fiche de l'envoi $id";
});

Route::get('/categories', function (){
   return "liste des catégories";
});

Route::get('/categories/{id}', function ($id){
        return "Catégorie $id";
});
