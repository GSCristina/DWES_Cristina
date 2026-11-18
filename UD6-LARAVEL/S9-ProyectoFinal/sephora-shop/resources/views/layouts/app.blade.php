<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Catálogo') · BeautyShop</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <header class="site-header">
        <div class="container">
            <a class="logo" href="{{ route('home') }}">BeautyShop</a>
            <nav class="main-nav" aria-label="Principal">
                <a href="{{ route('products.index') }}"
                   class="{{ request()->routeIs('products.index') || request()->routeIs('home') ? 'active' : '' }}">Catálogo</a>
                <a href="{{ route('products.create') }}"
                   class="{{ request()->routeIs('products.create') ? 'active' : '' }}">Nuevo producto</a>
            </nav>
        </div>
    </header>

    <main id="contenido" class="container">
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                Revisa el formulario:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">BeautyShop · Proyecto final DWES 2.º DAW</div>
    </footer>
</body>
</html>