<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'GameManager')
    </title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #222;
        }

        nav {
            background: #20232a;
            padding: 16px;
        }

        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        main {
            width: 92%;
            max-width: 1100px;
            margin: 30px auto;
        }

        .grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(270px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            width: auto;
        }

        .checkbox-list label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
        }

        .button {
            display: inline-block;
            padding: 9px 14px;
            border: 0;
            border-radius: 5px;
            background: #20232a;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .button-danger {
            background: #b42318;
        }

        .button-secondary {
            background: #59636e;
        }

        .tag {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            background: #e5e7ff;
            border-radius: 15px;
            text-decoration: none;
        }

        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: #d9f7df;
        }

        .alert-error {
            background: #ffd7d7;
        }

        .error {
            color: #b42318;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>

<body>
    <nav>
        <a href="{{ route('videojuegos.index') }}">
            Videojuegos
        </a>

        <a href="{{ route('videojuegos.create') }}">
            Nuevo videojuego
        </a>

        <a href="{{ route('desarrolladoras.index') }}">
            Desarrolladoras
        </a>
    </nav>

    <main>
        @if (session('mensaje'))
            <div class="alert">
                {{ session('mensaje') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>