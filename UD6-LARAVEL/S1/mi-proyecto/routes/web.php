<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/hola', function () {
    return view('hola');
});
Route::get('/', function () {
    return view('index');
});
