<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller; // Utilisation de Controller au lieu de Auth
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            Log::info($request->all());

            // Validation des données de la requête
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:5',
            ]);

            // Création d'un nouvel utilisateur
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Retourner une réponse JSON avec l'utilisateur créé et le statut 201 (Created)
            return response()->json($user, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Gestion des erreurs de validation
            return response()->json(['error' => 'Validation error', 'messages' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Gestion des erreurs générales
            return response()->json(['error' => 'Server error', 'message' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        // Validation des données de la requête
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérification des identifiants de l'utilisateur
        if (Auth::attempt($credentials)) {
            // Création d'un token d'authentification pour l'utilisateur
            $token = Auth::user()->createToken('authToken')->plainTextToken;

            // Retourner une réponse JSON avec le token
            return response()->json(['token' => $token]);
        }

        // Retourner une réponse JSON avec un message d'erreur et le statut 401 (Unauthorized)
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        // Suppression du token d'authentification actuel de l'utilisateur
        $request->user()->currentAccessToken()->delete();

        // Retourner une réponse JSON avec un message de succès
        return response()->json(['message' => 'Logged out']);
    }
}
