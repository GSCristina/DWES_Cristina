<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad - printf incompleto</title>
</head>
<body>
    <h1>Actividad con printf</h1>

    <?php
        $aerolinea      = "AirGlobal";
        $numVuelo       = 1205;
        $precioBase     = 245.5;
        $tasaCombustible= 12.3456;
        $ocupacion      = 87;          // porcentaje de ocupación
        $codigoInterno  = 0b101101;
        $distancia      = 5.6e3;       // 5600 km
        $velCrucero     = 902.456;     // km/h

        // Imprime el nombre de la aerolínea en 10 espacios, alineado a la izquierda
        printf("Aerolínea: [%-10s]<br>", $aerolinea);

        // Número de vuelo como entero
        printf("Vuelo Nº: %d<br>", $numVuelo);

        // Precio base con 2 decimales, en un campo de 8 caracteres
        printf("Precio base: [%8.2f €]<br>", $precioBase);

        // Tasa combustible con 4 decimales
        printf("Tasa combustible: %.4f €<br>", $tasaCombustible);

        // Porcentaje de ocupación (mostrar el símbolo %)
        printf("Ocupación: %d%%<br>", $ocupacion);

        // Código interno en binario
        printf("Código interno: %b<br>", $codigoInterno);

        // Distancia en notación científica
        printf("Distancia: %e km<br>", $distancia);

        // Mezcla de variables en la misma línea (vuelo y velocidad)
        printf("El vuelo %d de %s vuela a %.3f km/h<br>", $numVuelo, $aerolinea, $velCrucero);

        echo "<hr> SPRINTF <br>";
        $txt_pi = sprintf("El número PI vale %+.2f", 3.1416);
        echo $txt_pi;

        echo "<hr> Diferencias entre printf y sprintf <br>";
        $txt_distancia = printf("Distancia: %e km <br>", $distancia);
        echo $txt_distancia;
    ?>
</body>
</html>