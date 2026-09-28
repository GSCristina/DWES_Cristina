<?php
echo "Esta es la primera línea.\n";
echo "Esta es la segunda línea.\n";
echo "Esta es la tercera línea.\r\n"; // Para mayor compatibilidad

?>

 <?php
    echo "<br><br><H1> CUANDO USAMOS BR ... </H1><br>";
    echo "Esta es la primera línea.<br>";
    echo "Esta es la segunda línea.<br>";


    $textoConSaltos = "Esta es la primera línea.\nEsta es la segunda línea.";
    echo nl2br($textoConSaltos);
?>
<?php
    $nombre = "Cristina";~
    $edad = 30;
    echo "<br> Mi nombre es $nombre y tengo $edad años. <br>";

    echo "<br> ESTO SON FUNCIONES DE PHP <br>";
    $x = 10; // Ámbito global

    function miFuncion() {
        global $x; // Hace $x accesible dentro de la función "global debe ser puesto dentro de la funcion"
        echo $x;
    }

    miFuncion(); // Imprime: 10
?>
<?php
    echo "<br> ESTO SON ESTATICAS <br>";
    function contador() {
        static $contador = 0; // Persiste su valor entre llamadas
        $contador++;
        echo $contador;
    }

    contador(); // Imprime: 1
    contador(); // Imprime: 2
    contador(); // Imprime: 3
?>  