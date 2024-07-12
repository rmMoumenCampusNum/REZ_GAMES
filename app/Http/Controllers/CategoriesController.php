<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    // Méthode show pour récupérer et afficher des informations via une route définie dans web.php.
    public function show(){
        // Retourne une réponse JSON avec les informations d'un exemple de catégorie.
        return response()->json([
            'name' => 'Abigail',
            'description' => 'CA',
        ]);
    }


    // Méthode showID pour récupérer et afficher les informations d'une catégorie spécifique via une route définie dans web.php.
    public function showID(string $id){
        // echo "Fiche du produit $id";
    }
}
