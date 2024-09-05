<@extends('layouts.app')

@section('title', 'Liste des Users')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Utilisateurs</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un User</a>
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
            <th>Email</th>
            <th>Adress</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
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
