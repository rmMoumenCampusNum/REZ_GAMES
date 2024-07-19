<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
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
    public function show($id): JsonResponse
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // Mettre à jour une catégorie existante
    public function update(Request $request, $id): JsonResponse
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
    public function destroy($id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Catégorie supprimée avec succès']);
    }
}
