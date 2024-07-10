<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customer/{id}', function($id){
    return "Fiche du client $id";
});
