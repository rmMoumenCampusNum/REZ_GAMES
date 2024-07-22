<?php

// Déclaration du namespace de la classe CategoriesController
namespace App\Http\Controllers;

// Inclusion des modèles et classes nécessaires
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

// Déclaration de la classe CategoriesController qui hérite de Controller
class CategoriesController extends Controller
{
    // Méthode pour afficher une liste des catégories
    public function index(): JsonResponse
    {
        // Récupère toutes les catégories avec leurs relations avec 'item'
        $categories = Category::with('item')->get();
        // Retourne les catégories sous forme de réponse JSON
        return response()->json($categories);
    }

    // Méthode pour créer une nouvelle catégorie
    public function store(Request $request): JsonResponse
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required', // Le champ 'name' est requis
            'description' => 'nullable', // Le champ 'description' est optionnel
            'item_id' => 'required|exists:items,id', // Le champ 'item_id' est requis et doit exister dans la table 'items'
        ]);

        // Crée une nouvelle catégorie avec les données validées
        $category = Category::create($request->all());

        // Retourne la catégorie créée sous forme de réponse JSON avec le statut 201 (Created)
        return response()->json($category, 201);
    }

    // Méthode pour afficher une catégorie spécifique
    public function show($id): JsonResponse
    {
        // Trouve la catégorie par son ID, incluant sa relation avec 'item'
        $category = Category::with('item')->findOrFail($id);
        // Retourne la catégorie trouvée sous forme de réponse JSON
        return response()->json($category);
    }

    // Méthode pour mettre à jour une catégorie existante
    public function update(Request $request, $id): JsonResponse
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required', // Le champ 'name' est requis
            'description' => 'nullable', // Le champ 'description' est optionnel
            'item_id' => 'required|exists:items,id', // Le champ 'item_id' est requis et doit exister dans la table 'items'
        ]);

        // Trouve la catégorie par son ID
        $category = Category::findOrFail($id);
        // Met à jour la catégorie avec les données validées
        $category->update($request->all());

        // Retourne la catégorie mise à jour sous forme de réponse JSON
        return response()->json($category);
    }

    // Méthode pour supprimer une catégorie
    public function destroy($id): JsonResponse
    {
        // Trouve la catégorie par son ID
        $category = Category::findOrFail($id);
        // Supprime la catégorie
        $category->delete();

        // Retourne une réponse JSON indiquant que la catégorie a été supprimée avec succès
        return response()->json(['message' => 'Catégorie supprimée avec succès']);
    }
}
