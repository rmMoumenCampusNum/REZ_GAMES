<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;

class ItemsController extends Controller
{

    public function index()
    {
        $Item = Item::all();

        return response('La liste de produits');
    }

    public function show($id)
    {
        return response("Fiche du produit {$id}");
    }
}
