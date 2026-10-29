@extends('layouts.app')

@section('titulo', 'Listado de artículos')

@section('estilos')
    @parent
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('contenido')
    <h1>Todas las asignaturas</h1>

    <x-alert
    tipo="exito"
    mensaje="El artículo se ha guardado correctamente."
    />

    <x-alert tipo="error">
    No se pudo procesar la solicitud.
    </x-alert>

    <x-tarjeta titulo="Últimas noticias">
        <p>Aquí va el contenido de la tarjeta.</p>
    </x-tarjeta>

    

    @forelse ($posts as $post)
        <article class="tarjeta">
            <h2>{{ $post->titulo }}</h2>
            <p>{{ $post->resumen }}</p>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                Leer el artículo
            </a>
        </article>
    @empty
        <p>No hay artículos publicados todavía.</p>
    @endforelse
@endsection

@section('scripts')
    @parent
    <script>
        console.log('La vista del listado está preparada.');
    </script>
@endsection