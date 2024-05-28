@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Hotels</h1>
    <!-- Formulaire de recherche -->
    <form class="form-inline mb-3" style="justify-content: center;">
        <div class="form-group mx-sm-3 mb-2">
            <label for="searchTitle" class="sr-only">Search by Title</label>
            <input type="text" class="form-control" id="searchTitle" name="titre" placeholder="Enter Title" value="{{ request('titre') }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>

    <a href="{{ route('hotels.create') }}" class="btn btn-primary mb-3">Add Hotel</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Address</th>
                <th>Unit Price</th>
                <th>Room Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
                <td>{{ $hotel->titre }}</td>
                <td>{{ $hotel->adresse }}</td>
                <td>{{ $hotel->prix_unitaire }}</td>
                <td>{{ $hotel->type_chambre }}</td>
                <td>
                    <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
