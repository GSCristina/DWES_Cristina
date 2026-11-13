<?php

namespace App\Http\Controllers;

use App\Models\Desarrolladora;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DesarrolladoraController extends Controller
{
    public function index(): View
    {
        $desarrolladoras =
            Desarrolladora::withCount('videojuegos')
                ->orderBy('nombre')
                ->get();

        return view(
            'desarrolladoras.index',
            compact('desarrolladoras')
        );
    }

    public function create(): View
    {
        return view('desarrolladoras.create');
    }

    public function store(
        Request $request
    ): RedirectResponse {
        $datos = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:150',
            ],

            'pais' => [
                'required',
                'string',
                'max:100',
            ],

            'fundacion' => [
                'nullable',
                'integer',
                'between:1800,2026',
            ],
        ]);

        Desarrolladora::create($datos);

        return redirect()
            ->route('desarrolladoras.index')
            ->with(
                'mensaje',
                'Desarrolladora creada correctamente.'
            );
    }

    public function edit(
        Desarrolladora $desarrolladora
    ): View {
        return view(
            'desarrolladoras.edit',
            compact('desarrolladora')
        );
    }

    public function update(
        Request $request,
        Desarrolladora $desarrolladora
    ): RedirectResponse {
        $datos = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:150',
            ],

            'pais' => [
                'required',
                'string',
                'max:100',
            ],

            'fundacion' => [
                'nullable',
                'integer',
                'between:1800,2026',
            ],
        ]);

        $desarrolladora->update($datos);

        return redirect()
            ->route('desarrolladoras.index')
            ->with(
                'mensaje',
                'Desarrolladora actualizada.'
            );
    }

    public function destroy(
        Desarrolladora $desarrolladora
    ): RedirectResponse {
        if ($desarrolladora->videojuegos()->exists()) {
            return redirect()
                ->route('desarrolladoras.index')
                ->with(
                    'error',
                    'No se puede eliminar una desarrolladora con videojuegos.'
                );
        }

        $desarrolladora->delete();

        return redirect()
            ->route('desarrolladoras.index')
            ->with(
                'mensaje',
                'Desarrolladora eliminada.'
            );
    }
}