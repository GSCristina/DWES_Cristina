<?php
$videojuego = "Zelda";

$genero = match($videojuego) {
    "FIFA" => "Deportes",
    "Call of Duty" => "Shooter",
    "Zelda" => "Aventura",
    "Minecraft" => "Sandbox",
    default => "Género desconocido",
};

echo "El juego $videojuego pertenece al género: $genero";
?>