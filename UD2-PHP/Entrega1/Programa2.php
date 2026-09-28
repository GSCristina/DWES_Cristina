<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo PHP con variables</title>
</head>
<body>
    <h1>Ejemplo de variable en PHP</h1>

    <?php
        // Primer bloque PHP: creamos la variable
        $nombre = "Cristina";
    ?>

    <p>El valor de la variable es:</p>

    <?php
        // Segundo bloque PHP: mostramos la variable
        echo "<strong> $nombre </strong>";
    ?>
    <?php
        // Mostramos con print
        print "<br> Hola, mundo";
    ?>
    <?php
        // Mostramos print con concatenación
        print "<br> Hola, " . $nombre;
    ?>
    <?php
    print "<h1>ESTO ES UN TÍTULO</h1>";
    echo 10 + 5; // Imprime: 15
    print "<br>";
    print 10 - 5; // Imprime: 5
    ?>  
    <?php
    print "<br><h2>Mostrando printf<br></h2>";
    printf("Número decimal: %d\n", 42); // Salida: Número decimal: 42
    echo "<br>"; 
    printf("Número binario: %b\n", 5); // Salida: Número binario: 101
    echo "<br>";
    printf("Número octal: %o\n", 8); // Salida: Número octal: 10
    echo "<br>";
    printf("Número hexadecimal: %x\n", 255); // Salida: Número hexadecimal
    echo "<br>";
    ?>
    <?php
    print "<h2>Mostrando punto flotante<br></h2>";
    printf("Número flotante: %f\n", 3.14159); // Salida: Número flotante: 3.141590
    printf("Número flotante con 2 decimales: %.2f\n", 3.14159); // Salida: Número flotante con 2 decimales: 3.14
    echo "<br>";
    printf("Número flotante con notación científica: %.2e\n", 12345.6789); // Salida: Número flotante con notación científica: 1.23e+04
    echo "<br>";
    ?>
    <?php
    print "<h2>Mostrando cadenas<br></h2>";
    printf("Hola, %s!\n", "Mundo"); // Salida: Hola, Mundo!
    echo "<br>";
    printf("Cadena limitada: %.5s\n", "Hola, Mundo"); // Salida: Cadena limitada: Hola,
    ?>
    <?php
    print "<h2>Mostrando alineación<br></h2>";
    printf("Número alineado a la derecha: '%5d'\n", 42); // Salida: Número alineado a la derecha: '   42'
    echo "<br>";
    printf("Número alineado a la izquierda: '%-5d'\n", 42); // Salida: Número alineado a la izquierda: '42
    echo "<br>";
    printf("Número con ceros a la izquierda: '%05d'\n", 42); // Salida: Número con ceros a la izquierda: '00042'  '
    ?>
    <?php
    print "<h2>Mostrando combinacion de formatos<br></h2>";
    $nombre = "Cristina";
    $edad = 30;
    $altura = 1.64;

    printf("Nombre: %s, Edad: %d años, Altura: %.2f metros\n", $nombre, $edad, $altura);
    // Salida: Nombre: Cristina, Edad: 30 años, Altura: 1.64 metros
    ?>
</body>
</html>