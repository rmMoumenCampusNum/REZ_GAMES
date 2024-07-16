<?php
use App\Http\Controllers\OrdersConroller;
use App\Http\Controllers\UserController;
use app\Http\Controllers\ItemController;
use app\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

Route::get('/', function () {
    return view('welcome');
});


// route Items / Johan
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [\app\Http\Controllers\ItemController::class, 'show']);

//assignation du controleur pour la route user, avec comme texte d'affichage si ok return ['Tableau' => 'La liste des clients'];
Route::get('/user', [UserController::class, 'showAll']);
// assignation du controleur pour la route user$id, avec comme texte d'affichage si ok ""User controller Ok with $id";
Route::get('/user/{id}', [UserController::class, 'showOne']);

Route::get('/orders', [OrdersConroller::class, 'showAllOrders']);

Route::get('/orders/{id}', [OrdersConroller::class, 'showOneOrder']);
Route::get('/shipments', function () {
    return "La liste des envoi";
});

Route::get('/shipments/{id}', function ($id) {
    return "Fiche de l'envoi $id";
});

Route::get('/Categories', [\App\Http\Controllers\CategoriesController::class, 'show']);

Route::get('/Categories/{id}', [\App\Http\Controllers\CategoriesController::class, 'showID']);

Route::get('/shipments', function (){
    return "La liste des envoi";
});

Route::get('/shipments/{id}', function ($id){
    return "Fiche de l'envoi $id";
});


