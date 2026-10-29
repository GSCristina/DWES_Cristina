@php
    $urlCodificada = urlencode($url);
@endphp

<aside class="tarjeta" aria-label="Compartir artículo">
    <h2>Compartir este artículo</h2>

    <a
        href="https://wa.me/?text={{ $urlCodificada }}"
        target="_blank"
        rel="noopener noreferrer"
    >
        Compartir por WhatsApp
    </a>

    <p>
        Enlace: <a href="{{ $url }}">{{ $url }}</a>
    </p>
</aside>