@extends('layouts.app')

@section('titulo', $post->titulo)

@section('contenido')
    <article class="tarjeta">
        <h1>{{ $post->titulo }}</h1>
        <p>{{ $post->contenido }}</p>
    </article>

    @include('partials.comentarios', [
        'comentarios' => $post->comentarios,
    ])

    @include('partials.compartir', [
        'url' => request()->url(),
    ])
@endsection