<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Catálogo de productos</title>
</head>
<body>
    <h1>Catálogo de productos</h1>
    <p><a href="{{ route('productos.create') }}">Añadir producto</a></p>

    @if (session('success'))
        <p role="status">{{ session('success') }}</p>
    @endif

    @forelse ($productos as $producto)
        <article>
            <h2>{{ $producto->nombre }}</h2>
            <p>Precio: {{ number_format($producto->precio, 2, ',', '.') }} €</p>
            <p>Unidades disponibles: {{ $producto->stock }}</p>
        </article>
    @empty
        <p>Todavía no hay productos registrados.</p>
    @endforelse
</body>
</html>