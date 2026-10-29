@extends('layouts.app')

@section('titulo', 'Catálogo')

@section('contenido')
    <h1>Nuestro catálogo</h1>

    <p>Actualmente contamos con una seccion de {{ count($productos) }} productos.</p>

    <ul>
        @forelse ($productos as $producto)
            <li>
                <strong>{{ $producto['nombre'] }}</strong>
                — {{ $producto['precio'] }} €
            </li>
        @empty
            <li>Ups! Nos hemos quedado sin ropita.</li>
        @endforelse
    </ul>
@endsection