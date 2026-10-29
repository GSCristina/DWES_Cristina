@props(['nombre' => 'Servicio', 'precio' => 'Consultar', 'icono' => '🚕'])

<article class="tarjeta">
    <span aria-hidden="true">{{ $icono }}</span>
    <h2>{{ $nombre }}</h2>
    <div>{{ $slot }}</div>
    <strong>Desde {{ $precio }} €</strong>
</article>