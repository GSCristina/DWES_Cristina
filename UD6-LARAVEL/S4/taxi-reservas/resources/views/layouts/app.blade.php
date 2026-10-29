<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Taxi Fernán Núñez')</title>

    @section('estilos')
        <style>
            * { box-sizing: border-box; }
            body { margin: 0; font-family: Arial, sans-serif; color: #243447; background: #f2f6f8; }
            .barra, .pie { padding: 1rem 5%; background: #123d55; color: white; }
            .barra a { color: white; margin-right: 1rem; }
            .contenedor { width: min(1000px, 92%); margin: 2rem auto; }
            .tarjeta, .formulario, .aviso, .alerta {
                background: white; border-radius: 12px; padding: 1.2rem;
                margin: 1rem 0; box-shadow: 0 3px 12px #123d5518;
            }
            .rejilla { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; }
            label { display: block; font-weight: bold; margin-top: .8rem; }
            input, select, textarea { width: 100%; padding: .7rem; margin-top: .25rem; border: 1px solid #aabac4; border-radius: 6px; font: inherit; }
            .boton { margin-top: 1rem; padding: .8rem 1.2rem; border: 0; border-radius: 7px; background: #087e8b; color: white; font-weight: bold; cursor: pointer; }
            .error { color: #a32020; }
            .alerta-exito { border-left: 6px solid #218653; background: #e8f7ee; }
            .alerta-error { border-left: 6px solid #c43333; background: #fff0ef; }
        </style>
    @show
</head>
<body>
    @include('partials.nav')

    <main class="contenedor">
        @yield('contenido')
    </main>

    @include('partials.footer')
</body>
</html>