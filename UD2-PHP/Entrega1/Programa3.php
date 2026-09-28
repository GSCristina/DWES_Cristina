<?php

$nombreProducto = "Camiseta básica";
$categoria = "Ropa";

$precioCamiseta = 19.95;       // 2 decimales
$precioPantalon = 39.99;       // 2 decimales

$valoracion = 4.5678;           // 4 decimales
$descuento = 12.3456;           // 4 decimales

$stock = 125;                   // Entero
$codigoProducto = 25;           // Se mostrará en binario

$ventasAnuales = 1250000;       // Notación científica
$iva = 0.210;                   // Real con 3 decimales

echo "<h1>Datos de la tienda de ropa</h1>";

echo "Producto: " . $nombreProducto . "<br>";
echo "Categoría: " . $categoria . "<br>";

printf("Precio de la camiseta: %.2f €<br>", $precioCamiseta);
printf("Precio del pantalón: %.2f €<br>", $precioPantalon);

printf("Valoración del producto: %.4f<br>", $valoracion);
printf("Descuento aplicado: %.4f %%<br>", $descuento);

printf("Unidades disponibles: %d<br>", $stock);

printf("Código del producto en binario: %b<br>", $codigoProducto);

printf("Ventas anuales en notación científica: %e<br>", $ventasAnuales);

printf("IVA aplicado: %.3f<br>", $iva);
?>