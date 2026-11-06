<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('titulo', 'Academia Web') · Aula Web</title>
  <link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">
</head>
<body>
<header class="cabecera"><div class="contenedor barra"><a class="marca" href="{{ route('usuarios.index') }}"></> Aula Web</a><nav><a href="{{ route('usuarios.index') }}">Usuarios</a><a href="{{ route('usuarios.create') }}">Nuevo usuario</a></nav></div></header>
<main class="contenedor principal">
  @if (session('ok'))<div class="alerta exito" role="status">{{ session('ok') }}</div>@endif
  @if ($errors->any())<div class="alerta error" role="alert"><strong>Revisa el formulario:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
  @yield('contenido')
</main>
<footer class="pie">Proyecto educativo · CRUD con Laravel 13</footer>
</body>
</html>