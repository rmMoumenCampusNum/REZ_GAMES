<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    // Méthode pour afficher une liste des catégories
    public function index(): View
    {
        $categories = Category::with('item')->get();
        return view('categories.index', compact('categories'));
    }

    // Méthode pour afficher le formulaire de création d'une nouvelle catégorie
    public function create(): View
    {
        return view('categories.create');
    }

    // Méthode pour créer une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'item_id' => 'required|exists:items,id',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    // Méthode pour afficher une catégorie spécifique
    public function show(Category $category): View
    {
        return view('categories.show', compact('category'));
    }

    // Méthode pour afficher le formulaire de modification d'une catégorie existante
    public function edit(Category $category): View
    {
        return view('categories.edit', compact('category'));
    }

    // Méthode pour mettre à jour une catégorie existante
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'item_id' => 'required|exists:items,id',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    // Méthode pour supprimer une catégorie
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
