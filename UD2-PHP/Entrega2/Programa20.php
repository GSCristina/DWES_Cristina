<?php
echo "<h2>Pruebas de count</h2>";
$amigos = array('Marcos','Vanesa','Emma','Antonio','Belen');

$numero_elementos = count($amigos); // count() devuelve el número de elementos de un array

echo $numero_elementos . "<br>";

?>
<?php
echo "<h2>Pruebas de date</h2>";

$fecha = date('Y-m-d H:i:s'); // date() devuelve la fecha y hora actual en el formato especificado

echo $fecha . "<br>";

?>

<?php
echo "<h2>Pruebas de explode</h2>";

$cadena = 'Cristina,Carmen,Luque,Javier,Angel,Antonio';

$crea_array = explode(',', $cadena); // explode() divide una cadena en un array utilizando un delimitador especificado

echo '<pre>';

print_r($crea_array);

echo '</pre>';

?>

<?php
echo "<h2>Pruebas de implode</h2>";
$amigos = array('Cristina','Carmen','Luque','Javier','Angel','Antonio');

$crea_cadena = implode(', ', $amigos); // implode() une los elementos de un array en una cadena, utilizando un delimitador especificado

echo $crea_cadena;

?>

<?php
echo "<h2>Pruebas de nl2br</h2>";
$texto = "Hola\nMundo"; // \n es un salto de línea
echo nl2br($texto);
?>
<?php

echo "<h2>Pruebas de strcmp</h2>";

$clave1 = 'Hola mundo';

$clave2 = 'Hola mundo';

$comparar = strcmp($clave1, $clave2); // strcmp() compara dos cadenas y devuelve 0 si son iguales, un número negativo si la primera es menor que la segunda y un número positivo si la primera es mayor que la segunda



if($comparar == 0){

    echo "Son iguales -- $comparar";

}else{

    echo "NO son iguales -- $comparar";

}

?>
<?php
echo "<h2>Pruebas de strlen</h2>";

$nombre = 'Cristina Civico';

$numero_caracteres = strlen($nombre); // strlen() devuelve el número de caracteres de una cadena

echo $numero_caracteres;

?>
<?php
echo "<h2>Pruebas de strip_tags</h2>";

$nombre = 'Cristina <b>Civico</b>';

$solo_texto = strip_tags($nombre); // strip_tags() elimina las etiquetas HTML y PHP de una cadena

echo $solo_texto;

?>
<?php

echo "<h2>Pruebas de htmlspecialchars</h2>";

$texto = '<b>Hola</b>';
echo htmlspecialchars($texto, ENT_QUOTES, 'UTF-8'); // htmlspecialchars() convierte caracteres especiales en entidades HTML para evitar la ejecución de código malicioso

?>

<?php

echo "<h2>Pruebas de todas las funciones (Generado de IA</h2>";

$amigos = ['Marcos', 'Vanesa', 'Emma'];
echo "Número de amigos: " . count($amigos) . "<br>";

echo "Fecha actual: " . date('d/m/Y') . "<br>";

$cadena = "Cristina,Carmen,Luque";
$nombres = explode(',', $cadena);
echo "Primer nombre: " . $nombres[0] . "<br>";

echo "Nombres unidos: " . implode(' - ', $amigos) . "<br>";

$texto = "Hola\nMundo";
echo nl2br($texto) . "<br>";

$resultado = strcmp('Hola', 'Hola');
echo "Resultado de strcmp: " . $resultado . "<br>"; // 0 significa que son iguales

$nombreConHtml = "<b>Cristina</b>";
echo strip_tags($nombreConHtml) . "<br>";

$nombre = "Cristina";
echo "Cantidad de caracteres: " . strlen($nombre);
?>