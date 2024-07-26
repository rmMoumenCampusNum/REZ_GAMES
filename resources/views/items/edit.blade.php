@extends('layouts.app')

@section('title', 'Modifier l\'item')

@section('content')
    <h1>Modifier l'item</h1>
    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Name</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ $item->titre }}" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control" required>{{ $item->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $item->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
