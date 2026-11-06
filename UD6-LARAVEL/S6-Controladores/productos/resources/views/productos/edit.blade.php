<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar producto</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    <h1>Editar producto #{{ $producto->id }}</h1>
    <a href="{{ route('productos.index') }}">Volver al listado</a>

    @if ($errors->any())
        <ul role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('productos.update', $producto) }}">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre"
               value="{{ old('nombre', $producto->nombre) }}">
        @error('nombre') <p>{{ $message }}</p> @enderror

        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" step="0.01"
               value="{{ old('precio', $producto->precio) }}">
        @error('precio') <p>{{ $message }}</p> @enderror

        <label for="stock">Stock</label>
        <input id="stock" name="stock" type="number" step="1"
               value="{{ old('stock', $producto->stock) }}">
        @error('stock') <p>{{ $message }}</p> @enderror

        <button type="submit">Actualizar producto</button>
    </form>
</body>
</html>