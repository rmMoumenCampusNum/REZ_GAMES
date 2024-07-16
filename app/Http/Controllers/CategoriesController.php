<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    // Méthode show pour récupérer et afficher des informations via une route définie dans web.php.
    public function show(): View {

        $categories = Category::all();


        return view('categories.categorie', compact('categories'));
    }


    // Méthode showID pour récupérer et afficher les informations d'une catégorie spécifique via une route définie dans web.php.
    public function showID(string $id): View {
         //echo "Fiche du produit $id";
        $category = Category::findOrFail($id);
        return view('categories.showID', compact('category'));
    }
}
