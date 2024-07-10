<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer', function () {
    return 'La liste des clients';
});

Route::get('/customer/{id}', function($id){
    return "Fiche du client $id";
});

