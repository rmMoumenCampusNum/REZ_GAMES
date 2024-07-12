<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
abstract class ItemsController extends Controller
{

    /**
     * Affiche la liste des produits.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return response('La liste de produits');
    }

    /**
     * Affiche les détails d’un produit spécifique.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response("Fiche du produit {$id}");
    }
}
