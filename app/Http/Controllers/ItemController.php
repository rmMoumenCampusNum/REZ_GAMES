<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;

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
    public function store(StoreItemRequest $request)
    {
        // Création de l'item
        $item = Item::create($request->validated());

        // Retourner une réponse JSON
        return response()->json($item, 201);
    }

    // Affiche le formulaire d'édition pour un item spécifique
    public function edit(Item $item)
    {
        // Retourner les données de l'item pour l'édition
        return response()->json($item);
    }

    // Met à jour un item spécifique
    public function update(UpdateItemRequest $request, Item $item)
    {
        // Mise à jour de l'item
        $item->update($request->validated());

        // Retourner une réponse JSON
        return response()->json($item, 200);
    }

    // Supprime un item spécifique
    public function destroy(Item $item)
    {
        // Suppression de l'item
        $item->delete();

        // Retourner une réponse JSON
        return response()->json(['message' => 'Item deleted'], 200);
    }
}
