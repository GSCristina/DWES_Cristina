<?php

print "<h1>Funciones en PHP</h1>";
print "<h2>Funciones simples</h2>";
// Función simple sin argumentos
function precioConIVA(): float {
    $precio = 399;  // definido dentro de la función
    $iva = 21;      // definido dentro de la función
    $precioFinal = $precio + ($precio * $iva / 100);
    return round($precioFinal, 2);
}

// Ejemplo de uso
echo "Precio con IVA: " . precioConIVA() . " €<br>"; // Llamada a la función y muestra del resultado

print "<h2>Funciones Condicionales</h2>";
// Función con condicional
$condicionalFuncion = true;
$precio = 10;

print("<br />Llamada antes de condicional: No puede hacerse<br>");   
if ($condicionalFuncion) {
    function precio_con_iva_condi() {
        global $precio;
        $precioiva = $precio * 1.21;
        print "El precio con IVA es " . $precioiva;
    }
}

print "<br />Llamada después de condicional<br>";

precio_con_iva_condi();   // Aquí ya no da error
?>