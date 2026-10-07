<?php
$array = ["manzana", "pera", "uva"];

echo "<h1>Funciones para trabajar con arrays</h1>";

echo "<h2>Añadir elemento</h2>";
$array[] = "naranja";
echo "Se añade naranja al final: ";
print_r($array);

echo "<h2>Modificar elemento</h2>";
$array[2] = "uva modificada";
echo "Se modifica la posición 2: ";
print_r($array);

echo "<h2>Eliminar elemento</h2>";
unset($array[2]);
echo "Se elimina la posición 2: ";
print_r($array);
echo "El índice 2 ya no existe: " . (array_key_exists(2, $array) ? "sí" : "no") . "<br>";

echo "<h2>Reindexar array numérico</h2>";
$array = array_values($array);
echo "Después de array_values(): ";
print_r($array);
echo "El índice 2 existe ahora: " . (array_key_exists(2, $array) ? "sí" : "no") . "<br>";

echo "<h2>Comprobar si es un array</h2>";
echo "¿$array es un array? ";
echo is_array($array) ? "true<br>" : "false<br>";

echo "<h2>Contar elementos</h2>";
echo "Número de elementos: " . count($array) . "<br>";

echo "<h2>Buscar valor</h2>";
$valorBuscado = "pera";
echo "¿Está $valorBuscado en el array? ";
echo in_array($valorBuscado, $array, true) ? "true<br>" : "false<br>";

echo "<h2>Buscar valor y obtener su clave</h2>";
$claveEncontrada = array_search($valorBuscado, $array, true);
if ($claveEncontrada !== false) {
	echo "La clave de $valorBuscado es $claveEncontrada.<br>";
} else {
	echo "El valor $valorBuscado no está en el array.<br>";
}

echo "<h2>Buscar clave</h2>";
$claveBuscada = 1;
echo "¿Existe la clave $claveBuscada? ";
echo array_key_exists($claveBuscada, $array) ? "true<br>" : "false<br>";
?>
