<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del ordenador</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>{{ $ordenador->marca }} {{ $ordenador->modelo }}</h1>
    <p>Código: {{ $ordenador->codigo }}</p>
    <p>Procesador: {{ $ordenador->procesador }}</p>
    <p>RAM: {{ $ordenador->ram_gb }} GB</p>
    <p>Precio: {{ number_format($ordenador->precio, 2, ',', '.') }} €</p>
    <a href="{{ route('catalogo') }}">Volver al catálogo</a>
</body>
</html>