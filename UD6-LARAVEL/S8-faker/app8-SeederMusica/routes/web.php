<?php

use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

// Redirigir la portada al catálogo.
Route::redirect('/', '/songs');

// GET /songs → SongController@index.
Route::get('/songs', [SongController::class, 'index'])
    ->name('songs.index');