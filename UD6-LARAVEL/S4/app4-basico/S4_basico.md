# Proyecto vistas

Con ciertas instrucciones podemos rellenar los huecos marcados por estas con @yield.

![1793005149951](image/README/1793005149951.png)


```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo', 'Moda básica')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h2>Moda básica</h2>

        <nav>
            <a href="{{ route('inicio') }}">Inicio</a>
            <a href="{{ route('catalogo') }}">Catálogo</a>
            <a href="{{ route('contacto') }}">Contacto</a>
        </nav>
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>© {{ date('Y') }} Moda básica · Proyecto de clase</p>
    </footer>
</body>
</html>
```

## Heredar el layout desde inicio



```php
@extends('layouts.app')

@section('titulo', 'Inicio')

@section('contenido')
    <h1>Bienvenido a Moda básica</h1>

    <p>Descubre nuestras prendas de ejemplo.</p>

    <a href="{{ route('catalogo') }}">Ver catálogo</a>
@endsection
```

![1793005351330](image/README/1793005351330.png)

## Pasar datos a la vista

![1793005719166](image/README/1793005719166.png)

Comprobación de comprensión

![1793006423697](image/README/1793006423697.png)

![1793006719209](image/README/1793006719209.png)
