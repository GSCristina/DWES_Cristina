<?php
    print "<br/><br/>  ARGUMENTOS POR valor y por referencia <br  /> ";//ARGUMENTOS POR DEFECTO
    function precio_iva_referencia (&$precio /*le pasas su direcion de memoria 100325*/, $iva=0.15) {
        $precio *= (1 + $iva); 
    }

    $precio = 20;  //imagina que su MEMORY ADDRESS vale 100325
    print "<br/><br/>1- ANTES de llamar a la función:  El precio con IVA es ".$precio ;  //20

    precio_iva_referencia($precio);

    print "<br/>2- DESPUES de llamar a la función:  El precio con IVA es ". $precio ;  //23
    print "<br/><b>3- Anota en tus apuntes qué RETURN has usado</b>";
    print "<br/><b>4- No hemos usado ningun RETURN</b>"

?>
<?php
// Versión moderna (PHP 5.6+)
function sumarModern(...$numeros) {
    $suma = 0;
    foreach ($numeros as $n) {
        $suma += $n;
    }
    return $suma;
}

// Versión clásica (PHP <5.6)
function sumarClasico() {
    $args = func_get_args(); // obtiene todos los argumentos como array
    $suma = 0;
    foreach ($args as $n) {
        $suma += $n;
    }
    return $suma;
}

// Ejemplos de uso
echo "Suma moderna (7 + 9): " . sumarModern(7, 9) . "<br>";
echo "Suma moderna (4 + 52 + 75 + 46 + 5): " . sumarModern(4, 52, 75, 46, 5) . "<br>";

echo "Suma clásica (7 + 9): " . sumarClasico(7, 9) . "<br>";
echo "Suma clásica (4 + 52 + 75 + 46 + 5): " . sumarClasico(4, 52, 75, 46, 5) . "<br>";

?>