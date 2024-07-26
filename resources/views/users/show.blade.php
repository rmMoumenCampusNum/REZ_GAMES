@extends('layouts.app')

@section('title', 'Détails de l\'utilisateur')

@section('content')
    <h1>{{ $user>name }}</h1>
    <p>{{ $user->email }}</p>
    <p>Password: {{ $user->password }}</p>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
