<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Bienvenue sur votre Dashboard, {{ $user->name }}</h1>
    <p>Vous êtes connecté au Back Office !</p>
@endsection
