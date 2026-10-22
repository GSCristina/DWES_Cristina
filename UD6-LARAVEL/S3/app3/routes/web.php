<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/ping', function () {
    return 'pong';
});
Route::match(['get', 'post'], '/formulario', function () {
    return 'Esto responde a GET y POST';
});
Route::get('/hola', function () {
    return 'Hola, soy Cristina!';
});
Route::get('/api/info', function () {
    return response()->json([
        'app'     => 'El blog de Cristina',
        'version' => '1.0',
        'status'  => 'ok',
    ]);
});
