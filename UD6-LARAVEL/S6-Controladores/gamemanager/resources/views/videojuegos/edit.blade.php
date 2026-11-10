@extends('layouts.app')

@section('title', 'Editar videojuego')

@section('content')
    <div class="card">
        <h1>
            Editar {{ $videojuego->titulo }}
        </h1>

        <form
            method="POST"
            action="{{ route(
                'videojuegos.update',
                $videojuego
            ) }}"
        >
            @csrf
            @method('PUT')

            @include('videojuegos._form')
        </form>
    </div>
@endsection