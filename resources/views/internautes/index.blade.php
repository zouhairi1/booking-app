@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Internautes</h1>
     <!-- Formulaire de recherche -->
     <form action="{{ route('internautes.index') }}" method="GET" class="form-inline mb-3" style="justify-content: center;">
        <div class="form-group mx-sm-3 mb-2">
            <label for="searchCin" class="sr-only">Search by CIN</label>
            <input type="text" class="form-control" id="searchCin" name="cin" placeholder="Enter CIN" value="{{ request('cin') }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>

    <a href="{{ route('internautes.create') }}" class="btn btn-primary">Add Internaute</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Date de Naissance</th>
                <th>CIN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($internautes as $internaute)
            <tr>
                <td>{{ $internaute->nom }}</td>
                <td>{{ $internaute->prenom }}</td>
                <td>{{ $internaute->adresse }}</td>
                <td>{{ \Carbon\Carbon::parse($internaute->date_naissance)->format('d/m/Y') }}</td>
                <td>{{ $internaute->cin }}</td>
                <td>
                    <a href="{{ route('internautes.show', $internaute->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('internautes.edit', $internaute->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('internautes.destroy', $internaute->id) }}" method="POST" style="display:inline;">
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
