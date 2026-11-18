@extends('layouts.app')

@section('title', 'No encontrado')

@section('content')
    <div class="card">
        <h1>404 · Página no encontrada</h1>
        <p>El producto o la página que buscas no existe.</p>
        <a class="btn" href="{{ route('products.index') }}">Volver al catálogo</a>
    </div>
@endsection