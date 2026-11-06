@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('contenido')
<div class="cabecera-pagina"><div><span class="etiqueta">GESTIÓN DE CURSOS WEB</span><h1>Alumnado matriculado</h1><p>Consulta y gestiona los usuarios de los cursos.</p></div><a class="boton" href="{{ route('usuarios.create') }}">+ Nuevo usuario</a></div>
<div class="tarjeta">
<form action="{{ route('usuarios.index') }}" method="GET" class="buscador"><label for="buscar">Buscar usuarios</label><div class="fila"><input id="buscar" name="buscar" value="{{ $busqueda }}" placeholder="Nombre, correo o curso"><button class="boton" type="submit">Buscar</button><a class="boton secundario" href="{{ route('usuarios.index') }}">Limpiar</a></div></form>
<div class="tabla-scroll"><table><thead><tr><th>Nombre</th><th>Email</th><th>Curso web</th><th>Acciones</th></tr></thead><tbody>
@forelse ($usuarios as $usuario)
<tr><td><strong>{{ $usuario->name }}</strong></td><td>{{ $usuario->email }}</td><td><span class="chip">{{ $usuario->curso_web }}</span></td><td class="acciones"><a href="{{ route('usuarios.show', $usuario) }}">Ver</a><a href="{{ route('usuarios.edit', $usuario) }}">Editar</a><form method="POST" action="{{ route('usuarios.destroy', $usuario) }}" onsubmit="return confirm('¿Eliminar este usuario?')">@csrf @method('DELETE')<button type="submit" class="enlace-peligro">Eliminar</button></form></td></tr>
@empty<tr><td colspan="4">No hay usuarios que coincidan con la búsqueda.</td></tr>
@endforelse
</tbody></table></div>
<div class="paginacion">{{ $usuarios->links() }}</div>
</div>
@endsection