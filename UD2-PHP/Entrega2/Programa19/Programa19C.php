<?php
echo "<h2>Pruebas de include / require</h2>";

// 3. include_once (solo se incluirá una vez)
include_once "funciones.php";
echo "2 x 10 = " . multiplicar(2, 10) . "<br>";

?>