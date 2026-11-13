@extends('layouts.app')

@section('title', $videojuego->titulo)

@section('content')
    <article class="card">
        <h1>{{ $videojuego->titulo }}</h1>

        <p>{{ $videojuego->descripcion }}</p>

        <p>
            <strong>Desarrolladora:</strong>
            {{ $videojuego->desarrolladora->nombre }}
        </p>

        <p>
            <strong>País:</strong>
            {{ $videojuego->desarrolladora->pais }}
        </p>

        <p>
            <strong>Año:</strong>
            {{ $videojuego->anio }}
        </p>

        <p>
            <strong>Precio:</strong>
            {{ number_format(
                $videojuego->precio,
                2
            ) }} €
        </p>

        <h2>Ficha técnica</h2>

        @if ($videojuego->fichaTecnica)
            <ul>
                <li>
                    Plataforma:
                    {{ $videojuego
                        ->fichaTecnica
                        ->plataforma }}
                </li>

                <li>
                    Motor:
                    {{ $videojuego
                        ->fichaTecnica
                        ->motor_grafico }}
                </li>

                <li>
                    Edad:
                    PEGI
                    {{ $videojuego
                        ->fichaTecnica
                        ->edad_recomendada }}
                </li>

                <li>
                    Espacio:
                    {{ $videojuego
                        ->fichaTecnica
                        ->espacio_gb }} GB
                </li>

                <li>
                    Modo:
                    {{ $videojuego
                        ->fichaTecnica
                        ->modo_juego }}
                </li>
            </ul>
        @else
            <p>No existe ficha técnica.</p>
        @endif

        <h2>Géneros</h2>

        @foreach ($videojuego->generos as $genero)
            <a
                class="tag"
                href="{{ route(
                    'generos.show',
                    $genero
                ) }}"
            >
                {{ $genero->nombre }}
            </a>
        @endforeach

        <div class="actions">
            <a
                class="button"
                href="{{ route(
                    'videojuegos.edit',
                    $videojuego
                ) }}"
            >
                Editar
            </a>

            <a
                class="button button-secondary"
                href="{{ route('videojuegos.index') }}"
            >
                Volver
            </a>
        </div>
    </article>
@endsection