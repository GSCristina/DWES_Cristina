@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido a Mundo bebe</h1>

    <p>Descubre el maravilloso mundo de los bebes, con ropita para todas las edades.</p>

    <a href="{{ route('catalogo') }}">Ver catálogo</a>
@endsection