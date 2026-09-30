<?php
define("IVA", 0.21);
print "<p>El valor de iva es " . IVA . "</p>\n";
?>
<?php
define("AUTOR", "Cervantes");
print "<p>Autor: " . AUTOR . "</p>\n";
?>
<?php
define("LIBRO", ["Melocoton loco", "Megan Maxwell", 2020]);
print "<p>" . LIBRO[1] . " escribió " . LIBRO[0] . " en " . LIBRO[2] . ".</p>\n";
?>
<?php
const PI = 3.14;
print "<p>El valor de pi es " . PI . "</p>\n";
?>
<?php
const AUTOR_CONST = "Bartolomé Sintes Marco";
print "<p>Autor: " . AUTOR . "</p>\n";
?>
<?php
const LIBRO_CONST = ["Don Quijote", "Cervantes", 1605];
print "<p>" . LIBRO_CONST[1] . " escribió " . LIBRO_CONST[0] . " en " . LIBRO_CONST[2] . ".</p>\n";
?>
<?php
define("CODIGO_POSTAL", 14520);
print "<p>El valor de código postal es CODIGO_POSTAL</p>\n";         // El valor NO se sustituye
print "<p>El valor de código postal es {CODIGO_POSTAL}</p>\n";       // El valor NO se sustituye
print "<p>El valor de código postal es " . CODIGO_POSTAL . "</p>\n"; // El valor SÍ se sustituye
?>
<?php
print "<p>Estas usando la versión " . PHP_VERSION . " de PHP.</p>\n";
print "<p>Sistema operativo: " . PHP_OS . "</p>\n";
print "<p>Directorio de instalación: " . PHP_BINDIR . "</p>\n";
?>
