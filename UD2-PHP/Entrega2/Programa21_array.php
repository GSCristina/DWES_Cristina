<?php
//Ejemplo Definición de array simple

$array1 = array(
    "comida" => "pizza",
    "pizza" => "comida",
);

echo $array1["comida"] . "<br>"; // muestra pizza

// a partir de PHP 5.4
$array2 = [
    "comida" => "pizza",
    "pizza" => "comida",
];
echo $array2["pizza"] . "<br>";  // muestra comida

//mostrar un valor de cada uno

echo "<h2>Array simple</h2>";

$array3 = array("lunes", "martes", "miércoles", "jueves", "viernes");

echo $array3[0] . "<br>"; // muestra lunes
echo $array3[1] ."<br>"; 
echo $array3[2] ."<br>"; 
echo $array3[3] ."<br>"; 
echo $array3[4] ."<br>";

?>