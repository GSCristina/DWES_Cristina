@extends('layouts.app')

@section(
    'title',
    'Género: ' . $genero->nombre
)

@section('content')
    <h1>
        Videojuegos de {{ $genero->nombre }}
    </h1>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Desarrolladora</th>
                <th>Año</th>
                <th>Acción</th>
            </tr>
        </thead>

        <tbody>
            @forelse (
                $genero->videojuegos
                as $videojuego
            )
                <tr>
                    <td>
                        {{ $videojuego->titulo }}
                    </td>

                    <td>
                        {{
                            $videojuego
                                ->desarrolladora
                                ->nombre
                        }}
                    </td>

                    <td>
                        {{ $videojuego->anio }}
                    </td>

                    <td>
                        <a
                            href="{{ route(
                                'videojuegos.show',
                                $videojuego
                            ) }}"
                        >
                            Ver
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        No hay videojuegos asociados.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection