<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\InternauteController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::resource('internautes', InternauteController::class);
Route::resource('reservations', ReservationController::class);
Route::resource('hotels', HotelController::class);



