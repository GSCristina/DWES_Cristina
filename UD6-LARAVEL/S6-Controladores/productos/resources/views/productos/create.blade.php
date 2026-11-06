<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <title>Nuevo producto</title>
</head>
<body>
    <h1>Crear producto</h1>
    <a href="{{ route('productos.index') }}">Volver al listado</a>

    @if ($errors->any())
        <div role="alert">
            <p>Revisa los datos introducidos:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre</label>
        <input id="nombre" name="nombre" value="{{ old('nombre') }}">
        @error('nombre') <p role="alert">{{ $message }}</p> @enderror

        <label for="precio">Precio</label>
        <input id="precio" name="precio" type="number" min="0" step="0.01"
               value="{{ old('precio') }}">
        @error('precio') <p role="alert">{{ $message }}</p> @enderror

        <label for="stock">Stock</label>
        <input id="stock" name="stock" type="number" min="0" step="1"
               value="{{ old('stock', 0) }}">
        @error('stock') <p role="alert">{{ $message }}</p> @enderror

        <button type="submit">Guardar producto</button>
    </form>
</body>
</html>