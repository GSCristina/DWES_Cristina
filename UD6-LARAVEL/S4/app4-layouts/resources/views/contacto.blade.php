@extends('layouts.app')

@section('titulo', 'Contacto')

@section('contenido')
    <h1>Contacto</h1>
    <p>Escribe a <a href="mailto:info@example.test">soycristina@example.test</a>.</p>
    <x-alert tipo="info" mensaje="Esta página utiliza el componente Alert." />
@endsection