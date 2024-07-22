<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function showAllOrders ()
    {
      return response()->json(Order::all());
    }

    public function showOneOrder ($id)
    {
        return response()->json(Order::find($id));
    }

    // Créer une commande
    public function store(Request $request)
    {
        // Valider les données reçues si nécessaire
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'updated_at' => 'required|date_format:Y-m-d H:i:s',
            'shipments_id' => 'required|integer|exists:shipments,id',
        ]);

        // Créer une nouvelle commande avec les données validées
        $order = Order::create($validated);

        // Retourner la commande créée avec un statut 201
        return response()->json($order, 201); // 201 Created
    }

    // Mettre à jour une commande
    public function update(Request $request, $id)
    {

        // Valider les données reçues si nécessaire
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
            'updated_at' => 'required|date_format:Y-m-d H:i:s',
            'shipments_id' => 'required|integer',
        ]);

        // Trouver la commande par son id
        $order = Order::findOrFail($id);

        // Mettre à jour la commande avec les données validées
        $order->update($validated);

        // Retourner la commande mise à jour
        return response()->json($order);
    }

    // Supprimer une commande
    public function destroy($id)
    {
        // Trouver la commande par son id
        $order = Order::find($id);

        // Supprimer la commande
        $order->delete();

        // Retourner une réponse vide avec un statut 204
        return response()->json(Order::all());
    }
}
