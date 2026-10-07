<?php
// Definir el array con ciudades
$ciudades = array("Sevilla", "Granada", "Córdoba", "Málaga", "Cádiz");

/* Programa23: COPIA COLOCA LAS FUNCIONES DONDE CORRESPONDADN :
next($ciudades) 
reset($ciudades) 
prev($ciudades) 
end($ciudades)
current($ciudades)
key($ciudades) 
*/

// 1. "FUNCION ARRAY RESET O CURRENT" → primer elemento
echo "Primer elemento con : " . "FUNCION ARRAY RESET O CURRENT" .current($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 2. "FUNCION ARRAY NEXT" → avanzar
echo "Siguiente Elemento con : " . "FUNCION ARRAY NEXT"  .next ($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 3. "FUNCION ARRAY PREV" → retroceder
echo "Elemento con  : " . "FUNCION ARRAY PREV"  .prev ($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 4. "FUNCION ARRAY END" → último elemento
echo "Último elemento con : " . "FUNCION ARRAY END"  .end($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";

// 5. next() después del último → fuera del array
$valor = next($ciudades);
if ($valor === false && key($ciudades) === null) {
    echo "El puntero está fuera del array (hemos pasado el final).<br>";
} else {
    echo "Elemento actual: $valor<br>";
}

//Vamos a forzar a forzar que se muestre
echo "Elemento con next() fuera del array: " . next($ciudades) . "<br>";
echo "Clave actual: " . key($ciudades) . "<br><br>";
?>