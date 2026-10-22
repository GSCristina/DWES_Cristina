<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi primera vista</title>
</head>
<body>
    <h1>¡Bienvenido a mi aplicación Laravel!</h1>
    <p>Soy Cristina y esta es mi primera vista.</p>
    @php
    $precio =50;
    $descuento = $precio * 0.1;
    $precioFinal = $precio - $descuento;
    @endphp

    <p>Precio final: {{ number_format($precioFinal, 2) }} €</p>
    <ul>
        <li>Post 1</li>
        <li>Post 2</li>
        <li>Post 3</li>
    </ul>
@php
    $posts = [
        (object) ['titulo' => 'Primer post'],
        (object) ['titulo' => 'Segundo post'],
        (object) ['titulo' => 'Tercer post'],
    ];    
@endphp

@forelse ($posts as $post)
    <article>
        <h2>{{ $post->titulo }}</h2>
    </article>
@empty
    <p>No hay artículos publicados aún.</p>
@endforelse
</body>
</html>