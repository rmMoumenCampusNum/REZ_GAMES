<?php

// Déclaration du namespace de la classe DashboardController
namespace App\Http\Controllers;

// Inclusion des classes nécessaires
use Illuminate\Http\Request;

// Déclaration de la classe DashboardController qui hérite de Controller
class DashboardController extends Controller
{
    // Méthode pour afficher le dashboard
    public function index(Request $request)
    {
        // Récupère l'utilisateur authentifié à partir de la requête
        $user = $request->user();

        // Retourne la vue 'layouts/dashboard' avec les données de l'utilisateur
        return view('layouts/dashboard', compact('user'));
    }
}
