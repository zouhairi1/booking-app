@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Edit Reservation</h1>
    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_internaute">Internaute:</label>
            <select class="form-control" id="id_internaute" name="id_internaute">
                @foreach($internautes as $internaute)
                <option value="{{ $internaute->id }}" {{ $reservation->id_internaute == $internaute->id ? 'selected' : '' }}>{{ $internaute->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_hotel">Hotel:</label>
            <select class="form-control" id="id_hotel" name="id_hotel">
                @foreach($hotels as $hotel)
                <option value="{{ $hotel->id }}" {{ $reservation->id_hotel == $hotel->id ? 'selected' : '' }}>{{ $hotel->titre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date_debut_sejour">Start Date:</label>
            <input type="date" class="form-control" id="date_debut_sejour" name="date_debut_sejour" value="{{ $reservation->date_debut_sejour }}">
        </div>
        <div class="form-group">
            <label for="date_fin_sejour">End Date:</label>
            <input type="date" class="form-control" id="date_fin_sejour" name="date_fin_sejour" value="{{ $reservation->date_fin_sejour }}">
        </div>
        <div class="form-group">
            <label for="titre">Title:</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $reservation->titre }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
