<?php
use App\Http\Controllers\OrdersConroller;
use App\Http\Controllers\UserController;
use app\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ROUTE pour les Items / Johan
Route::get('/items', function () {
    return "La liste des Items";
});

//ASSIGNATION CONTROLLER Items /Johan
Route::get('/items', [ItemController::class, 'index']);


Route::get('/customer', function () {
    return 'La liste des clients';
});

//assignation du controleur pour la route user, avec comme texte d'affichage si ok return ['Tableau' => 'La liste des clients'];
Route::get('/user', [UserController::class, 'showAll']);

// assignation du controleur pour la route user$id, avec comme texte d'affichage si ok ""User controller Ok with $id";
Route::get('/user/{id}', [UserController::class, 'showOne']);



// Route pour la fiche détail d'un produit.
Route::get('/product/{id}', function ($id){
    return "Fiche du produit $id";
});

Route::get('/orders', [OrdersConroller::class, 'orders']);

Route::get('/orders/{id}', function ($id) {
    return "Fiche du commande id $id";
});

Route::get('/shipments', function () {
    return "La liste des envoi";
});

Route::get('/shipments/{id}', function ($id) {
    return "Fiche de l'envoi $id";
});


Route::get('/Categories', [\App\Http\Controllers\CategoriesController::class, 'show']);

Route::get('/Categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'showId']);
