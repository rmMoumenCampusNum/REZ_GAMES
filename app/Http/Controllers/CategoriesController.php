<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Méthode pour récupérer toutes les catégories
    public function index()
    {
        // Récupère toutes les catégories
        $categories = Category::all();
        // Retourne les catégories au format JSON
        return response()->json($categories);
    }
    // Méthode pour récupérer les articles d'une catégorie spécifique
    public function getItemsByCategory($id)
    {
        // Recherche la catégorie par ID
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }

        // Récupère les articles associés à cette catégorie
        $items = $category->items; // Assure-toi que la relation 'items' est définie dans le modèle Category

        return response()->json($items);
    }
    // Méthode pour créer une nouvelle catégorie
    public function store(Request $request)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        // Crée une nouvelle catégorie
        $category = Category::create($request->all());

        // Retourne la catégorie créée au format JSON avec un code 201 (Créé)
        return response()->json($category, 201);
    }

    // Méthode pour afficher une catégorie spécifique
    public function show($id)
    {
        // Recherche la catégorie par ID
        $category = Category::find($id);

        if ($category) {
            // Si la catégorie existe, la retourner au format JSON
            return response()->json($category);
        } else {
            // Si la catégorie n'existe pas, retourne une erreur 404
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }
    }

    // Méthode pour mettre à jour une catégorie existante
    public function update(Request $request, $id)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        // Recherche la catégorie par ID
        $category = Category::find($id);

        if ($category) {
            // Met à jour la catégorie avec les nouvelles données
            $category->update($request->all());
            // Retourne la catégorie mise à jour au format JSON
            return response()->json($category);
        } else {
            // Si la catégorie n'existe pas, retourne une erreur 404
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }
    }

    // Méthode pour supprimer une catégorie
    public function destroy($id)
    {
        // Recherche la catégorie par ID
        $category = Category::find($id);

        if ($category) {
            // Supprime la catégorie
            $category->delete();
            // Retourne un message de succès
            return response()->json(['message' => 'Catégorie supprimée avec succès']);
        } else {
            // Si la catégorie n'existe pas, retourne une erreur 404
            return response()->json(['message' => 'Catégorie non trouvée'], 404);
        }
    }
}
