@extends('layouts.app')

@section('title', 'Détails de la catégorie')

@section('content')
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->description }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
