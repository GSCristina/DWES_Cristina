@extends('layouts.app')

@section('title', 'Crear videojuego')

@section('content')
    <div class="card">
        <h1>Crear videojuego</h1>

        <form
            method="POST"
            action="{{ route('videojuegos.store') }}"
        >
            @csrf

            @include('videojuegos._form')
        </form>
    </div>
@endsection