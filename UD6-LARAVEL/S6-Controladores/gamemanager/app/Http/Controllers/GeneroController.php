<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\View\View;

class GeneroController extends Controller
{
    public function show(Genero $genero): View
    {
        $genero->load([
            'videojuegos.desarrolladora',
        ]);

        return view(
            'generos.show',
            compact('genero')
        );
    }
}