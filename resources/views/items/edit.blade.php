@extends('layouts.app')

@section('title', 'Modifier un item')

@section('content')
    <h1>Modifier un item</h1>
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $item->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $item->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
