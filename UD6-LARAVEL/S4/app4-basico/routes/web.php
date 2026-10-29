<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::get('/catalogo', function () {
    return view('catalogo', [
        'productos' => [
            ['nombre' => 'Camiseta básica', 'precio' => 15],
            ['nombre' => 'Peto de cuadros', 'precio' => 35],
            ['nombre' => 'Pololo', 'precio' => 28],
            ['nombre' => 'Vestido blanco', 'precio'=> 35.99],
        ],
    ]);
})->name('catalogo');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
Route::get('/nosotros', function () {
    return view('nosotros');
})->name('nosotros');