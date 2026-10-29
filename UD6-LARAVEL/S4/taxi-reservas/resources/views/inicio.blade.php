@extends('layouts.app')
@section('titulo', 'Servicios de taxi')

@section('estilos')
    @parent
    <style>
        .portada { padding: 2rem; border-radius: 14px; color: white; background: linear-gradient(120deg, #123d55, #087e8b); }
    </style>
@endsection

@section('contenido')
    <section class="portada">
        <h1>Tu taxi, a un paso</h1>
        <p>Reserva traslados urbanos, viajes a estaciones y desplazamientos personalizados.</p>
        <a class="boton" href="{{ route('contacto') }}">Pedir una reserva</a>
    </section>

    @include('partials.aviso-servicio')

    <h2>Servicios disponibles</h2>
    <div class="rejilla">
        @forelse ($servicios as $servicio)
            <x-servicio-taxi
                :nombre="$servicio['nombre']"
                :precio="$servicio['precio']"
                :icono="$servicio['icono']"
            >
                <p>{{ $servicio['descripcion'] }}</p>
            </x-servicio-taxi>
        @empty
            <p>En este momento no hay servicios publicados.</p>
        @endforelse
    </div>
@endsection