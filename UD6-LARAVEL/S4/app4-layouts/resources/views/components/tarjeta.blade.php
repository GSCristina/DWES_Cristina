@props(['titulo' => 'Información'])

<article class="tarjeta">
    <h2>{{ $titulo }}</h2>
    <div>{{ $slot }}</div>
</article>