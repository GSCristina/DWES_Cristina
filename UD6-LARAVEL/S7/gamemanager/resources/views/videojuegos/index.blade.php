@extends('layouts.app')

@section('title', 'Videojuegos')

@section('content')
    <h1>Catálogo de videojuegos</h1>

    <p>
        <a
            class="button"
            href="{{ route('videojuegos.create') }}"
        >
            Crear videojuego
        </a>
    </p>

    <div class="grid">
        @forelse ($videojuegos as $videojuego)
            <article class="card">
                <h2>{{ $videojuego->titulo }}</h2>

                <p>
                    <strong>Desarrolladora:</strong>
                    {{ $videojuego->desarrolladora->nombre }}
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

                <p>
                    <strong>Estado:</strong>

                    {{ $videojuego->publicado
                        ? 'Publicado'
                        : 'Oculto'
                    }}
                </p>

                <div>
                    @foreach (
                        $videojuego->generos
                        as $genero
                    )
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
                </div>

                <div class="actions">
                    <a
                        class="button"
                        href="{{ route(
                            'videojuegos.show',
                            $videojuego
                        ) }}"
                    >
                        Ver
                    </a>

                    <a
                        class="button button-secondary"
                        href="{{ route(
                            'videojuegos.edit',
                            $videojuego
                        ) }}"
                    >
                        Editar
                    </a>

                    <form
                        method="POST"
                        action="{{ route(
                            'videojuegos.destroy',
                            $videojuego
                        ) }}"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            class="button button-danger"
                            type="submit"
                        >
                            Eliminar
                        </button>
                    </form>
                </div>
            </article>
        @empty
            <p>No existen videojuegos.</p>
        @endforelse
    </div>

    {{ $videojuegos->links() }}
@endsection