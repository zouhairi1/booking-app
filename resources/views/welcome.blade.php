@extends('layout')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Bienvenue sur Booking App !</h1>
        <p class="lead">Gérez facilement les réservations d'hôtels avec notre application.</p>
        <hr class="my-4">
        <p>Pour commencer, utilisez la navigation ci-dessus pour explorer les Internautes, Réservations et Hôtels.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('internautes.index') }}" role="button">Commencer</a>
    </div>
</div>
@endsection
