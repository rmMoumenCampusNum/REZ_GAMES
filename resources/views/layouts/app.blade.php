<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Définir le jeu de caractères de la page en UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Assurer un bon rendu et un redimensionnement sur les appareils mobiles -->
    <title>@yield('title', 'Back Office')</title> <!-- Définir le titre de la page, avec une valeur par défaut de "Back Office" -->
    <!-- Lien vers la feuille de style CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Back Office</a> <!-- Lien de retour à la page d'accueil -->
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Catégories</a> <!-- Lien vers la liste des catégories -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">Users</a> <!-- Lien vers la liste des utilisateurs -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('items.index') }}">Items</a> <!-- Lien vers la liste des items -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('orders.index') }}">Orders</a> <!-- Lien vers la liste des commandes -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('shipments.index') }}">Shipments</a> <!-- Lien vers la liste des envois -->
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth <!-- Vérifier si l'utilisateur est authentifié -->
            <li class="nav-item">
                <span class="navbar-text">{{ auth()->user()->name }}</span> <!-- Afficher le nom de l'utilisateur authentifié -->
            </li>
            <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf <!-- Jeton CSRF pour protéger le formulaire de déconnexion -->
                </form>
                <a class="nav-link" href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout <!-- Lien pour déconnecter l'utilisateur -->
                </a>
            </li>
            @else <!-- Si l'utilisateur n'est pas authentifié -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a> <!-- Lien vers la page de connexion -->
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a> <!-- Lien vers la page d'inscription -->
            </li>
            @endauth
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content') <!-- Insérer le contenu spécifique à chaque page -->
</div>

<!-- Inclusion des fichiers JavaScript de Bootstrap et des dépendances nécessaires -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
