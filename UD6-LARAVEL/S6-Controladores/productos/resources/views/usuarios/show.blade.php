@extends('layouts.app')
@section('titulo', $user->name)
@section('contenido')
<div class="cabecera-pagina"><div><span class="etiqueta">FICHA DE USUARIO</span><h1>{{ $user->name }}</h1><p>Información de la matrícula</p></div></div>
<section class="tarjeta ficha"><div><span class="etiqueta">CORREO</span><p>{{ $user->email }}</p></div><div><span class="etiqueta">CURSO</span><p><span class="chip">{{ $user->curso_web }}</span></p></div><div><span class="etiqueta">FECHA DE ALTA</span><p>{{ $user->created_at?->format('d/m/Y') }}</p></div><div class="fila"><a class="boton" href="{{ route('usuarios.edit', $user) }}">Editar</a><a class="boton secundario" href="{{ route('usuarios.index') }}">Volver</a><form method="POST" action="{{ route('usuarios.destroy', $user) }}" onsubmit="return confirm('¿Eliminar este usuario?')">@csrf @method('DELETE')<button class="boton peligro" type="submit">Eliminar</button></form></div></section>
@endsection