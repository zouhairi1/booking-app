@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Add Hotel</h1>
    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titre">Title:</label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="form-group">
            <label for="adresse">Address:</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>
        <div class="form-group">
            <label for="prix_unitaire">Unit Price:</label>
            <input type="number" class="form-control" id="prix_unitaire" name="prix_unitaire" min="0">
        </div>
        <div class="form-group">
            <label for="type_chambre">Room Type:</label>
            <select class="form-control" id="type_chambre" name="type_chambre">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Suite">Suite</option>
                <!-- Add more options if needed -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

