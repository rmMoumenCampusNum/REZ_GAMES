<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

use App\Http\Requests\UpdateItemRequest;
use App\Http\Requests;

class ItemController extends Controller
{
    // Affiche la liste des items
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    // Affiche un item spécifique par son ID
    public function show($id)
    {
        $item = Item::find($id);

        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
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

        // Retourner une réponse JSON avec l'item créé
        return response()->json($item, 201);
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
            return response()->json(['message' => 'Item not found'], 404);
        }

        // Mise à jour de l'item
        $item->update($validated);

        // Retourner une réponse JSON
        return response()->json(['message' => 'Item updated'], 200);
    }

    // Supprime un item spécifique
    public function destroy($id)
    {
        $item = Item::find($id);

        // Vérification si l'item existe
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $item->delete();

        // Retourner une réponse JSON
        return response()->json(['message' => 'Item delete'], 200);
    }
}




