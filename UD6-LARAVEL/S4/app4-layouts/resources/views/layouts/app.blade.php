<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Mi aplicación Laravel - agenda')</title>

    @section('estilos')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @show
</head>
<body>
    @include('partials.nav')

    <main class="contenedor">
        @yield('contenido')
    </main>

    @include('partials.footer')

    @section('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>