@extends('layouts.app')

@section('title', 'Créer un nouvel item')

@section('content')
    <h1>Créer un nouvel item</h1>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Name</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
