<?php
namespace App\Http\Controllers;

// Inclusion des modèles et classes nécessaires
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

// Déclaration de la classe CategoriesController qui hérite de Controller
class CategoriesController extends Controller
{
    // Méthode pour afficher une liste des catégories
    public function index(): View
    {
        // Récupère toutes les catégories avec leurs relations avec 'item'
        $categories = Category::with('item')->get();
        // Retourne la vue 'categories.index' avec les catégories récupérées
        return view('categories.index', compact('categories'));
    }

    // Méthode pour afficher le formulaire de création d'une nouvelle catégorie
    public function create(): View
    {
        // Retourne la vue 'categories.create' pour créer une nouvelle catégorie
        return view('categories.create');
    }

    // Méthode pour créer une nouvelle catégorie
    public function store(Request $request)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required', // Le champ 'name' est requis
            'description' => 'nullable', // Le champ 'description' est optionnel
            'item_id' => 'required|exists:items,id', // Le champ 'item_id' est requis et doit exister dans la table 'items'
        ]);

        // Crée une nouvelle catégorie avec les données validées
        Category::create($request->all());

        // Redirige vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    // Méthode pour afficher une catégorie spécifique
    public function show(Category $category): View
    {
        // Retourne la vue 'categories.show' avec la catégorie spécifiée
        return view('categories.show', compact('category'));
    }

    // Méthode pour afficher le formulaire de modification d'une catégorie existante
    public function edit(Category $category): View
    {
        // Retourne la vue 'categories.edit' avec la catégorie spécifiée
        return view('categories.edit', compact('category'));
    }

    // Méthode pour mettre à jour une catégorie existante
    public function update(Request $request, Category $category)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required', // Le champ 'name' est requis
            'description' => 'nullable', // Le champ 'description' est optionnel
            'item_id' => 'required|exists:items,id', // Le champ 'item_id' est requis et doit exister dans la table 'items'
        ]);

        // Met à jour la catégorie avec les données validées
        $category->update($request->all());

        // Redirige vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    // Méthode pour supprimer une catégorie
    public function destroy(Category $category)
    {
        // Supprime la catégorie spécifiée
        $category->delete();

        // Redirige vers la liste des catégories avec un message de succès
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
