@extends('layout')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Edit Internaute</h1>
    <form action="{{ route('internautes.update', $internaute->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $internaute->nom }}">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $internaute->prenom }}">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $internaute->adresse }}">
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance:</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $internaute->date_naissance }}">
        </div>
        <div class="form-group">
            <label for="cin">CIN:</label>
            <input type="text" class="form-control" id="cin" name="cin" value="{{ $internaute->cin }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
