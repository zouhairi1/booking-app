<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-family: 'Arial', sans-serif;
    }

    p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
        font-family: 'Arial', sans-serif;
    }

    p strong {
        color: #000;
    }

    p + p {
        margin-top: 10px;
    }
    </style>
</head>
@extends('layout')
<body>
    
    <div class="container">
        <h1>Hotel Details</h1>
        <p><strong>Title:</strong> {{ $hotel->titre }}</p>
        <p><strong>Address:</strong> {{ $hotel->adresse }}</p>
        <p><strong>Unit Price:</strong> {{ $hotel->prix_unitaire }}</p>
        <p><strong>Room Type:</strong> {{ $hotel->type_chambre }}</p>
    </div>
    
</body>
</html>