@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Edit Hotel</h1>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Title:</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $hotel->titre }}">
        </div>
        <div class="form-group">
            <label for="adresse">Address:</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $hotel->adresse }}">
        </div>
        <div class="form-group">
            <label for="prix_unitaire">Unit Price:</label>
            <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" value="{{ $hotel->prix_unitaire }}">
        </div>
        <div class="form-group">
            <label for="type_chambre">Room Type:</label>
            <input type="text" class="form-control" id="type_chambre" name="type_chambre" value="{{ $hotel->type_chambre }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
