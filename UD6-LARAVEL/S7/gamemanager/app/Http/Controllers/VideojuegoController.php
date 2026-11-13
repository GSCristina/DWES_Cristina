<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use App\Models\Genero;
use App\Models\Videojuego;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideojuegoController extends Controller
{
    public function index(): View
    {
        $videojuegos = Videojuego::with([
            'desarrolladora',
            'generos',
        ])
            ->latest()
            ->paginate(10);

        return view(
            'videojuegos.index',
            compact('videojuegos')
        );
    }

    public function create(): View
    {
        $desarrolladoras = Desarrolladora::orderBy(
            'nombre'
        )->get();

        $generos = Genero::orderBy('nombre')->get();

        return view(
            'videojuegos.create',
            compact('desarrolladoras', 'generos')
        );
    }

    public function store(
        Request $request
    ): RedirectResponse {
        $datos = $this->validar($request);

        $videojuego = Videojuego::create([
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'anio' => $datos['anio'],
            'precio' => $datos['precio'],
            'publicado' =>
                $request->boolean('publicado'),
            'desarrolladora_id' =>
                $datos['desarrolladora_id'],
        ]);

        $videojuego->fichaTecnica()->create([
            'plataforma' => $datos['plataforma'],
            'motor_grafico' =>
                $datos['motor_grafico'],
            'edad_recomendada' =>
                $datos['edad_recomendada'],
            'espacio_gb' => $datos['espacio_gb'],
            'modo_juego' => $datos['modo_juego'],
        ]);

        $videojuego->generos()->attach(
            $datos['generos']
        );

        return redirect()
            ->route('videojuegos.index')
            ->with(
                'mensaje',
                'Videojuego creado correctamente.'
            );
    }

    public function show(
        Videojuego $videojuego
    ): View {
        $videojuego->load([
            'desarrolladora',
            'fichaTecnica',
            'generos',
        ]);

        return view(
            'videojuegos.show',
            compact('videojuego')
        );
    }

    public function edit(
        Videojuego $videojuego
    ): View {
        $videojuego->load([
            'fichaTecnica',
            'generos',
        ]);

        $desarrolladoras = Desarrolladora::orderBy(
            'nombre'
        )->get();

        $generos = Genero::orderBy('nombre')->get();

        return view(
            'videojuegos.edit',
            compact(
                'videojuego',
                'desarrolladoras',
                'generos'
            )
        );
    }

    public function update(
        Request $request,
        Videojuego $videojuego
    ): RedirectResponse {
        $datos = $this->validar($request);

        $videojuego->update([
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'anio' => $datos['anio'],
            'precio' => $datos['precio'],
            'publicado' =>
                $request->boolean('publicado'),
            'desarrolladora_id' =>
                $datos['desarrolladora_id'],
        ]);

        $videojuego->fichaTecnica()->updateOrCreate(
            [
                'videojuego_id' => $videojuego->id,
            ],
            [
                'plataforma' => $datos['plataforma'],
                'motor_grafico' =>
                    $datos['motor_grafico'],
                'edad_recomendada' =>
                    $datos['edad_recomendada'],
                'espacio_gb' =>
                    $datos['espacio_gb'],
                'modo_juego' =>
                    $datos['modo_juego'],
            ]
        );

        $videojuego->generos()->sync(
            $datos['generos']
        );

        return redirect()
            ->route(
                'videojuegos.show',
                $videojuego
            )
            ->with(
                'mensaje',
                'Videojuego actualizado correctamente.'
            );
    }

    public function destroy(
        Videojuego $videojuego
    ): RedirectResponse {
        $videojuego->delete();

        return redirect()
            ->route('videojuegos.index')
            ->with(
                'mensaje',
                'Videojuego eliminado correctamente.'
            );
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'titulo' => [
                'required',
                'string',
                'max:200',
            ],

            'descripcion' => [
                'required',
                'string',
            ],

            'anio' => [
                'required',
                'integer',
                'between:1970,2030',
            ],

            'precio' => [
                'required',
                'numeric',
                'min:0',
                'max:9999.99',
            ],

            'desarrolladora_id' => [
                'required',
                'exists:desarrolladoras,id',
            ],

            'generos' => [
                'required',
                'array',
                'min:1',
            ],

            'generos.*' => [
                'exists:generos,id',
            ],

            'plataforma' => [
                'required',
                'string',
                'max:150',
            ],

            'motor_grafico' => [
                'required',
                'string',
                'max:150',
            ],

            'edad_recomendada' => [
                'required',
                'integer',
                'in:3,7,12,16,18',
            ],

            'espacio_gb' => [
                'required',
                'integer',
                'min:1',
            ],

            'modo_juego' => [
                'required',
                'string',
                'max:100',
            ],
        ]);
    }
}