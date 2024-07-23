<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // methode d'inscription
    public function InscrisUtilisateur(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $utilisateur = new User;

        $utilisateur->first_name = $request->first_name;
        $utilisateur->last_name = $request->last_name;
        $utilisateur->phone_number = $request->phone_number;
        $utilisateur->email = $request->email;
        $utilisateur->password = bcrypt($request->password);

        $utilisateur->save();

        return response()->json([
            'msg' => 'Utilisateur creation reussi',
            'status_code' => 200,
            'utilisateur' => $utilisateur
        ]);

    }
    // methode d'authentification

    public function connexion(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'non authoriser'
                ]);
            }

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error in Login',
                'error' => $error,
            ]);
        }
    }

}
