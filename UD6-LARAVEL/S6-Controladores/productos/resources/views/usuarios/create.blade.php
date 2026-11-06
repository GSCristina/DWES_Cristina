@extends('layouts.app')
@section('titulo', 'Nuevo usuario')
@section('contenido')
<div class="cabecera-pagina"><div><span class="etiqueta">ALTA</span><h1>Registrar usuario</h1><p>Matricula a una persona en un curso de desarrollo web.</p></div></div>
<form class="tarjeta formulario" method="POST" action="{{ route('usuarios.store') }}">@csrf @include('usuarios._form')</form>
@endsection