<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del móvil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>{{ $movil->marca }} {{ $movil->modelo }}</h1>
    <p>Código: {{ $movil->codigo }}</p>
    <p>Sistema operativo: {{ $movil->sistema_operativo }}</p>
    <p>Almacenamiento: {{ $movil->almacenamiento_gb }} GB</p>
    <p>IMEI: {{ $movil->imei }}</p>
    <p>Precio: {{ number_format($movil->precio, 2, ',', '.') }} €</p>
    <a href="{{ route('catalogo') }}">Volver al catálogo</a>
</body>
</html>