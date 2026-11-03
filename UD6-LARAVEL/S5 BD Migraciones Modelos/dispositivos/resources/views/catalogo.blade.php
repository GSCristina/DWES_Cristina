<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de dispositivos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Catálogo de dispositivos</h1>

    <h2>Ordenadores</h2>
    @forelse ($ordenadores as $ordenador)
        <article>
            <h3>{{ $ordenador->marca }} {{ $ordenador->modelo }}</h3>
            <p>Código: {{ $ordenador->codigo }}</p>
            <p>Procesador: {{ $ordenador->procesador }}</p>
            <p>Memoria RAM: {{ $ordenador->ram_gb }} GB</p>
            <p>Precio: {{ number_format($ordenador->precio, 2, ',', '.') }} €</p>
            <a href="{{ route('ordenadores.show', $ordenador->codigo) }}">
                Ver ordenador
            </a>
        </article>
    @empty
        <p>No hay ordenadores registrados.</p>
    @endforelse

    <h2>Móviles</h2>
    @forelse ($moviles as $movil)
        <article>
            <h3>{{ $movil->marca }} {{ $movil->modelo }}</h3>
            <p>Código: {{ $movil->codigo }}</p>
            <p>Sistema operativo: {{ $movil->sistema_operativo }}</p>
            <p>Almacenamiento: {{ $movil->almacenamiento_gb }} GB</p>
            <p>Precio: {{ number_format($movil->precio, 2, ',', '.') }} €</p>
            <a href="{{ route('moviles.show', $movil->codigo) }}">
                Ver móvil
            </a>
        </article>
    @empty
        <p>No hay móviles registrados.</p>
    @endforelse

    <p><a href="{{ route('resumen') }}">Ver resumen de lo aprendido</a></p>
</body>
</html>