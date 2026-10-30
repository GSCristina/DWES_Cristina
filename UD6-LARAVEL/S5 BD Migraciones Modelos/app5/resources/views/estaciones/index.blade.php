<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estaciones de movilidad</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1rem; color: #243447; background: #f2f6f8; }
        article { margin: 1rem 0; padding: 1rem 1.3rem; border-radius: 10px; background: white; box-shadow: 0 3px 12px #123d5518; }
        .estado { color: #287a45; font-weight: bold; }
        .inactivo { color: #a32020; }
        li { margin: .4rem 0; }
    </style>
</head>
<body>
    <h1>Estaciones de movilidad</h1>

    @forelse ($estaciones as $estacion)
        <article>
            <h2>{{ $estacion->nombre }}</h2>
            <p>Código: {{ $estacion->codigo }}</p>
            <p class="{{ $estacion->activa ? 'estado' : 'estado inactivo' }}">
                {{ $estacion->activa ? 'Activa' : 'Inactiva' }}
            </p>
            <h3>Vehículos</h3>
            <ul>
                @forelse ($estacion->vehiculos as $vehiculo)
                    <li>
                        {{ $vehiculo->modelo }} · {{ $vehiculo->tipo }} ·
                        {{ $vehiculo->disponible ? 'Disponible' : 'No disponible' }} ·
                        Autonomía: {{ $vehiculo->autonomia_km ?? 'Sin indicar' }} km
                        @if ($vehiculo->requiere_revision)
                                · <strong class="inactivo">Requiere revisión</strong>
                        @endif
                    </li>
                @empty
                    <li>Esta estación todavía no tiene vehículos.</li>
                @endforelse
            </ul>
        </article>
    @empty
        <p>No hay estaciones registradas.</p>
    @endforelse
</body>
</html>