@extends('layouts.app')

@section('title', 'Modifier la catégorie')

@section('content')
    <h1>Modifier la catégorie</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="item_id">Item</label>
            <input type="number" name="item_id" id="item_id" class="form-control" value="{{ $category->item_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
