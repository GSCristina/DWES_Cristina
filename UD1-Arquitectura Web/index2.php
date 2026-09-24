<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Primer Programa en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 400px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 8px 15px;
            cursor: pointer;
        }
        .mensaje {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #333;
        }
        .error {
            color: #b00020;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="nombre">Introduce tu nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ej. Ana" required>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = trim($_POST['nombre'] ?? '');

        if ($nombre === '') {
            echo '<p class="mensaje error">Debes introducir un nombre.</p>';
        } else {
            $nombreSeguro = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
            echo '<h2 class="mensaje">¡Hola, ' . $nombreSeguro . '!</h2>';
        }
    }
    ?>
</body>
</html>