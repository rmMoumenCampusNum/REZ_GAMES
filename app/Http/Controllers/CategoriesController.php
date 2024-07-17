<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
//    // Méthode show pour récupérer et afficher des informations via une route définie dans web.php.
//    public function show(): View {
//
//        $categories = Category::all();
//
//
//        return view('categories.categorie', compact('categories'));
//    }
//
//
//    // Méthode showID pour récupérer et afficher les informations d'une catégorie spécifique via une route définie dans web.php.
//    public function showID(string $id): View {
//         //echo "Fiche du produit $id";
//        $category = Category::findOrFail($id);
//        return view('categories.showID', compact('category'));
//    }

    // Afficher une liste des catégories
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Créer une nouvelle catégorie
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    // Afficher une catégorie spécifique
    public function show(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Mettre à jour une catégorie existante
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json($category);
    }

    // Supprimer une catégorie
    public function destroy(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Catégorie supprimée avec succès']);
    }
}
