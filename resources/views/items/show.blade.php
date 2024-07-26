@extends('layouts.app')

@section('title', 'Détails de l\'item')

@section('content')
    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <p>Prix: {{ $item->price }}</p>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Retour à la liste</a>
@endsection
