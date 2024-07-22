<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use phpDocumentor\Reflection\Types\Boolean;

class ItemController extends Controller
{

    public function index()
    {
        //Affiche la liste des items //Johan
        $items = Item::all();
        return response()->json($items);
    }

    public function create(Request $request)
    {
        //Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Ajoutez ici d'autres champs nécessaires avec leurs règles de validation
        ]);

        // Création de l'item
        $item = Item::create($validatedData);

        // Retourner une réponse JSON
        return response()->json($item, 201);
    }

    public function store(StoreItemRequest $request)
    {
        // Création de l'item
        $item = Item::create($request->validated());

        // Retourner une réponse JSON
        return response()->json($item, 201);
    }


    public function show(Item $item)
    {
        //Affiche un item spécifique par son ID
        $item = Item::find($id);

        if ($item) {
            return response()->json($item);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }

    public function edit(Item $item)
    {
        // Retourner les données de l'item pour l'édition
        return response()->json($item);
    }

    public
    function update(UpdateItemRequest $request, Item $item)
    {
        //M.a.j item
        $item->update($request->validated());

        // Retourner une réponse JSON
        return response()->json($item, 200);
    }


    public
    function destroy(Item $item)
    {
        // Suppression de l'item
        $item->delete();

        // Retourner une réponse JSON
        return response()->json(['message' => 'Item deleted'], 200);
    }
}
