<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Nuevo producto</title>
</head>
<body>
    <h1>Registrar producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text"
                   value="{{ old('nombre') }}" required maxlength="100">
            @error('nombre') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="precio">Precio (€)</label>
            <input id="precio" name="precio" type="number" step="0.01"
                   min="0" value="{{ old('precio') }}" required>
            @error('precio') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="stock">Stock</label>
            <input id="stock" name="stock" type="number" step="1"
                   min="0" value="{{ old('stock', 0) }}" required>
            @error('stock') <p>{{ $message }}</p> @enderror
        </div>

        <button type="submit">Guardar producto</button>
    </form>

    <p><a href="{{ route('productos.index') }}">Volver al catálogo</a></p>
</body>
</html>