<!-- Étendre le layout principal situé dans resources/views/layouts/app.blade.php -->
@extends('layouts.app')

<!-- Définir la section 'content' qui sera insérée dans le layout principal -->
@section('content')
    <!-- Afficher un message de bienvenue avec le nom de l'utilisateur connecté -->
    <!-- Afficher un message indiquant que l'utilisateur est connecté au Back Office -->
    <p>Vous êtes connecté au Back Office !</p>
@endsection
