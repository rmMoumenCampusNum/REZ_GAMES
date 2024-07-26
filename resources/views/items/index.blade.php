@extends('layouts.app')

@section('title', 'Liste des items')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Items</h1>
        <a href="{{ route('items.create') }}" class="btn btn-primary">Ajouter un item</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('items.show', $item) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
