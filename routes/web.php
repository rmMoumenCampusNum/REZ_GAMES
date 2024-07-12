<?php
use App\Http\Controllers\OrdersConroller;
use App\Http\Controllers\UserController;
use app\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('welcome');
});
// route Items / Johan
Route::get('/items', [ItemController::class, 'index']);
return ['La liste des produits'];

<<<<<<< HEAD

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
// ROUTE pour les Items / Johan
Route::get('/items', function () {
    return "La liste des Items";
});
=======
// route pour la liste des produits et les détails d'un produit.
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
>>>>>>> e09784a (route "La liste des produits")

//ASSIGNATION CONTROLLER Items /Johan
Route::get('/items', [ItemController::class, 'index']);


Route::get('/customer', function () {
    return 'La liste des clients';
=======
// route pour la liste des produits et les détails d'un produit. // Johan
Route::get('/items', [\app\Http\Controllers\ItemsController::class, 'index']);
{
=======
>>>>>>> 11d163a (route+controller Items)
    return ['La liste des produits']);
=======
>>>>>>> dc18802 (route+controller Items)
Route::get('/items/{id}', [\app\Http\Controllers\ItemsController::class, 'show']);


Route::get('/Users', function () {
    return ['Tableau' => 'La liste des clients'];
>>>>>>> 17637eb (route+controller Items)
});

//assignation du controleur pour la route user, avec comme texte d'affichage si ok return ['Tableau' => 'La liste des clients'];
Route::get('/user', [UserController::class, 'showAll']);

<<<<<<< HEAD
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
=======
});
>>>>>>> 17637eb (route+controller Items)
