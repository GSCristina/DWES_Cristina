<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo', 'Mundo bebe')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h2>Mundo bebe</h2>

        @include('partials.nav')
    </header>

    <main>
        @yield('contenido')
    </main>

    <footer>
        <p>© {{ date('Y') }} Moda bebe · Proyecto de clase</p>
    </footer>
</body>
</html>