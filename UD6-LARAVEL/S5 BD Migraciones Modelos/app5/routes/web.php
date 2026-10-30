<?php

use Illuminate\Support\Facades\Route;
use App\Models\Estacion;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/estaciones', function () {
    $estaciones = Estacion::with('vehiculos')
        ->orderBy('nombre')
        ->get();

    return view('estaciones.index', compact('estaciones'));
})->name('estaciones.index');
