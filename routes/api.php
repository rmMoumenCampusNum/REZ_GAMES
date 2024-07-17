<?php
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use app\Http\Controllers\ItemController;
use App\Http\Controllers\CategoriesController;
use app\Http\Controllers\ShipmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// route Items / Johan
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{id}', [\app\Http\Controllers\ItemController::class, 'show']);

//assignation du controleur pour la route user, avec comme texte d'affichage si ok return ['Tableau' => 'La liste des clients'];
Route::get('/user', [UserController::class, 'showAll']);
// assignation du controleur pour la route user$id, avec comme texte d'affichage si ok ""User controller Ok with $id";
Route::get('/user/{id}', [UserController::class, 'showOne']);

Route::get('/orders', [OrdersController::class, 'showAllOrders']);

Route::get('/orders/{id}', [OrdersController::class, 'showOneOrder']);
Route::get('/shipments', function () {
    return "La liste des envoi";
});

Route::get('/shipments/{id}', function ($id) {
    return "Fiche de l'envoi $id";
});

Route::get('/Categories', [\App\Http\Controllers\CategoriesController::class, 'show']);

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

Route::get('/card/{id}', function ($id){
    return "Card $id";
});


Route::apiResource('categories', CategoriesController::class);
