<?php
use App\Http\Controllers\OrdersController;
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
Route::get('/user/{id}', [UserController::class, 'showOne']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::delete('user/d{id}', [UserController::class, 'destroy']);

Route::get('/orders', [OrdersController::class, 'showAllOrders']);
Route::get('/orders/{id}', [OrdersController::class, 'showOneOrder']);

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



Route::get('/card/{id}', function ($id){
    return "Card $id";
});
