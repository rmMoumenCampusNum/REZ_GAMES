<?php
namespace App\Http\Controllers;

// Inclusion des modèles et classes nécessaires
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth; // Importer Auth

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login'); // Retourne la vue de connexion
    }

    // Afficher le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.register'); // Retourne la vue d'inscription
    }

    // Enregistrement d'un nouvel utilisateur
    public function register(Request $request)
    {
        // Valide les données de la requête
        $request->validate([
            'name' => 'required|string|max:255', // Le champ 'name' est requis, doit être une chaîne et ne pas dépasser 255 caractères
            'email' => 'required|string|email|max:255|unique:users', // Le champ 'email' est requis, doit être une chaîne, un email valide, unique dans la table 'users' et ne pas dépasser 255 caractères
            'password' => 'required|string|min:8|confirmed', // Le champ 'password' est requis, doit être une chaîne, avoir au moins 8 caractères et être confirmé (champ 'password_confirmation' doit correspondre)
        ]);

        // Crée un nouvel utilisateur avec les données validées
        $user = User::create([
            'name' => $request->name, // Assigne le nom de la requête à l'utilisateur
            'email' => $request->email, // Assigne l'email de la requête à l'utilisateur
            'password' => Hash::make($request->password), // Hache le mot de passe avant de l'assigner à l'utilisateur
        ]);

        // Authentifie l'utilisateur nouvellement enregistré
        Auth::login($user);

        // Redirige vers le tableau de bord avec un message de succès
        return redirect()->route('dashboard')->with('message', 'User registered successfully');
    }

    // Connexion d'un utilisateur
    public function login(Request $request)
    {
        // Valide les données de la requête
        $request->validate([
            'email' => 'required|string|email', // Le champ 'email' est requis, doit être une chaîne et un email valide
            'password' => 'required|string', // Le champ 'password' est requis et doit être une chaîne
        ]);

        // Recherche l'utilisateur par email
        $user = User::where('email', $request->email)->first();

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if (! $user || ! Hash::check($request->password, $user->password)) {
            // Si les identifiants sont incorrects, lance une exception de validation
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Authentifie l'utilisateur
        Auth::login($user);

        // Crée un token pour l'utilisateur
        $token = $user->createToken('auth_token')->plainTextToken;

        // Redirige vers le tableau de bord avec le token
        return redirect()->route('dashboard')->with('token', $token);
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        // Supprime les tokens de l'utilisateur
        $request->user()->tokens()->delete();

        // Déconnexion de la session web
        Auth::guard('web')->logout();

        // Invalide la session actuelle
        $request->session()->invalidate();

        // Régénère le token CSRF
        $request->session()->regenerateToken();

        // Redirige vers la page de connexion avec un message de succès
        return redirect()->route('login')->with('message', 'Successfully logged out');
    }

    // Récupérer l'utilisateur authentifié
    public function user(Request $request)
    {
        return response()->json($request->user()); // Retourne les informations de l'utilisateur authentifié en JSON
    }
}
