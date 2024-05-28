@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Reservations</h1>
       <!-- Formulaire de recherche -->
       <form class="form-inline mb-3" style="justify-content: center;">
        <div class="form-group mx-sm-3 mb-2">
            <label for="searchDateDebut" class="sr-only">Search by Start Date</label>
            <input type="date" class="form-control" id="searchDateDebut" name="date_debut_sejour" value="{{ request('date_debut_sejour') }}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search By Date Debut</button>
    </form>

    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Add Reservation</a>
    <table class="table">
        <thead>
            <tr>
                <th>Internaute</th>
                <th>Hotel</th>
                <th>Room Type</th>
                <th>Prix</th>

                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Titre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->internaute->prenom }} {{ $reservation->internaute->nom }}</td>
                <td>{{ $reservation->hotel->titre }}</td>
                <td>{{ $reservation->hotel->type_chambre }}</td> <!-- Display room type here -->
                <td>{{ $reservation->hotel->prix_unitaire }}</td> <!-- Display prix_unitaire here -->
                <td>{{ \Carbon\Carbon::parse($reservation->date_debut_sejour)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->date_fin_sejour)->format('d/m/Y') }}</td>
               

                <td>{{ $reservation->titre }}</td>

                <td>
                    <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
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
