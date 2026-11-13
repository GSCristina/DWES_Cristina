@extends('layouts.app')

@section('title', 'Desarrolladoras')

@section('content')
    <h1>Desarrolladoras</h1>

    <p>
        <a
            class="button"
            href="{{ route(
                'desarrolladoras.create'
            ) }}"
        >
            Nueva desarrolladora
        </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>País</th>
                <th>Fundación</th>
                <th>Videojuegos</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach (
                $desarrolladoras
                as $desarrolladora
            )
                <tr>
                    <td>
                        {{ $desarrolladora->nombre }}
                    </td>

                    <td>
                        {{ $desarrolladora->pais }}
                    </td>

                    <td>
                        {{ $desarrolladora->fundacion }}
                    </td>

                    <td>
                        {{
                            $desarrolladora
                                ->videojuegos_count
                        }}
                    </td>

                    <td>
                        <a
                            href="{{ route(
                                'desarrolladoras.edit',
                                $desarrolladora
                            ) }}"
                        >
                            Editar
                        </a>

                        <form
                            method="POST"
                            action="{{ route(
                                'desarrolladoras.destroy',
                                $desarrolladora
                            ) }}"
                            style="display:inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection