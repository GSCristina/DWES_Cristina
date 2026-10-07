<?php
$ciclos = array( 
    "DAW" => array(     "PR"   => "Programación",    "BD"   => "Bases de datos",    "DWES" => "Desarrollo web en entorno servidor"),
    "DAM" => array(     "PR"   => "Programación",    "BD"   => "Bases de datos",    "SGE" => "Sistemas de gestión empresarial")
);

//Array creado paso a paso
$modulos1[0] = "Programación";
$modulos1[1] = "Bases de datos";
$modulos1[2] = "Desarrollo web en entorno servidor";

// Mostrar elementos de array numérico
echo "<h3>Array numérico</h3>";
for ($i = 0; $i < count($modulos1); $i++) {
    echo "Módulo $i: " . $modulos1[$i] . "<br>";
}

// Mostrar elementos de array asociativo
echo "<h3>Array asociativo</h3>";
foreach ($ciclos['DAW'] as $clave => $valor) { // Recorrer array asociativo, debes indicar la clave del array asociativo que quieres recorrer
    echo "Siglas $clave => $valor <br>";
}
// Mostrar elementos de array multidimensional
foreach ($ciclos as $ciclo => $modulos) {
    echo "Ciclo: $ciclo <br>";
    foreach ($modulos as $codigo => $nombre) {
        echo "Módulo: $codigo => $nombre <br>";
    }
}
?>