<?php
echo "<h2>Pruebas de include / require</h2>";

// 4. require_once (solo se incluirá una vez)
require_once "funciones.php";
echo "30 / 10 = " . dividir(30, 10) . "<br>";
?>