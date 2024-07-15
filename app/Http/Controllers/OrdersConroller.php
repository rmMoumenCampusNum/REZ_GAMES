<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersConroller extends Controller
{
    public function showAllOrders () {
       $commandes = [
           ['id'=>1, 'produit'=>"Assassin's Creed Black Flag", 'quantite'=>1],
           ['id'=>2, 'produit'=>"GTA V", 'quantite'=>5],
           ['id'=>3, 'produit'=>"Castlevania", 'quantite' => 2 ]
       ];
       return response()->json($commandes);
    }

    public function ShowOneOrder ($id) {
        return [
            'id'=>$id,
        ];
    }
}
