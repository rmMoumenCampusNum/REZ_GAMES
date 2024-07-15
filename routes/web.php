<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('welcome');
});
// route Items / Johan
Route::get('/items', [ItemsController::class, 'index']);

Route::get('/items/{id}', [ItemsController::class, 'show']);


Route::get('/Users', function () {
    return ['Tableau' => 'La liste des clients'];
});

Route::get('/customer/{id}', function ($id) {
    return "Fiche du client $id";

});
