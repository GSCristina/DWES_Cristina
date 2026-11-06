@extends('layouts.app')
@section('titulo', 'Editar usuario')
@section('contenido')
<div class="cabecera-pagina"><div><span class="etiqueta">EDICIÓN</span><h1>Editar {{ $user->name }}</h1><p>Modifica los datos de matriculación.</p></div></div>
<form class="tarjeta formulario" method="POST" action="{{ route('usuarios.update', $user) }}">@csrf @method('PUT') @include('usuarios._form')</form>
@endsection