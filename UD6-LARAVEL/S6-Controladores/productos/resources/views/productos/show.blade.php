<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Detalle del producto</title><link rel="stylesheet" href="{{ asset('css/estilos.css') }}"></head>
<body>
    <h1>{{ $producto->nombre }}</h1>
    <p>Precio: {{ number_format($producto->precio, 2, ',', '.') }} €</p>
    <p>Stock: {{ $producto->stock }}</p>
    <a href="{{ route('productos.index') }}">Volver</a>
    <a href="{{ route('productos.edit', $producto) }}">Editar</a>
</body>
</html>