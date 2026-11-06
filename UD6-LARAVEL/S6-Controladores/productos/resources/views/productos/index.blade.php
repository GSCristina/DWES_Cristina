<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <h1>Catálogo de productos</h1>
    <a href="{{ route('productos.create') }}">Añadir producto</a>

    @if (session('success'))
        <p role="status">{{ session('success') }}</p>
    @endif

    @forelse ($productos as $producto)
        <article>
            <h2>{{ $producto->nombre }}</h2>
            <p>Precio: {{ number_format($producto->precio, 2, ',', '.') }} €</p>
            <p>Stock: {{ $producto->stock }}</p>
            <a href="{{ route('productos.show', $producto) }}">Ver</a>
            <a href="{{ route('productos.edit', $producto) }}">Editar</a>
            <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </article>
    @empty
        <p>No hay productos registrados.</p>
    @endforelse
</body>
</html>