<?php
function precioConIVA(float $precio, float $iva): float { // Función que calcula el precio con IVA con argumentos
//Opcion 2: function precioConIVA(float $precio, float $iva = 21): float {    
    // $precio → precio base
    // $iva    → porcentaje de IVA (por defecto 21%)
    $precioFinal = $precio + ($precio * $iva / 100);
    return round($precioFinal, 2); // Redondeamos a 2 decimales
}

// Ejemplo de uso
$precioBase = 1725.50;
echo "Precio base: $precioBase €<br>";
echo "Precio con IVA (21%): " . precioConIVA($precioBase, 21) . " €<br>";
//Opcion 2: echo "Precio con IVA (21%): " . precioConIVA($precioBase) . " €<br>";
echo "Precio con IVA (10%): " . precioConIVA($precioBase, 10) . " €<br>";
?>