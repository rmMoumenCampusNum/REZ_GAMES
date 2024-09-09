<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    // Affiche la liste des items
    public function index()
    {
        $items = Item::all();
        //return view('items.index', compact('items'));
        return response()->json($items); // Retourne les items au format JSON
    }

    // Affiche un item spécifique par son ID
    public function show($id)
    {
        $item = Item::find($id);

        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['error' => 'Item not found'], 404);
        }
    }

    // Affiche le formulaire de création d'un nouvel item
    public function create()
    {
        return view('items.create');
    }

    // Crée un nouvel item
    public function store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'titre' => 'required|string|max:255',
            'Description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Création d'un nouvel item
        $item = Item::create($request->all());

        // Redirection vers la liste des items avec un message de succès
        return redirect()->route('items.index')->with('success', 'Item créé avec succès');
    }

    // Affiche le formulaire de modification d'un item existant
    public function edit($id)
    {
        $item = Item::find($id);

        if ($item) {
            return view('items.edit', compact('item'));
        } else {
            return redirect()->route('items.index')->with('error', 'Item not found');
        }
    }

    // Met à jour un item spécifique
    public function update(Request $request, $id)
    {
        // Validation des données de la requête
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'Description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Recherche de l'item par ID
        $item = Item::find($id);

        // Vérification si l'item existe
        if (!$item) {
            return redirect()->route('items.index')->with('error', 'Item not found');
        }

        // Mise à jour de l'item
        $item->update($validated);

        // Redirection vers la liste des items avec un message de succès
        return redirect()->route('items.index')->with('success', 'Item mis à jour avec succès');
    }

    // Supprime un item spécifique
    public function destroy($id)
    {
        $item = Item::find($id);

        // Vérification si l'item existe
        if (!$item) {
            return redirect()->route('items.index')->with('error', 'Item not found');
        }

        $item->delete();

        // Redirection vers la liste des items avec un message de succès
        return redirect()->route('items.index')->with('success', 'Item supprimé avec succès');
    }
}
