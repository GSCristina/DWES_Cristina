<?php
$timestamp = time(); // Devuelve la marca de tiempo Unix actual (número de segundos desde el 1 de enero de 1970)
echo "<p>Marca de tiempo Unix: <strong>$timestamp</strong></p>";    

$fecha = getdate($timestamp); // Devuelve un array asociativo con las partes de la fecha y hora
print_r($fecha);
$formatos = [ //La función recibe dos parámetros, la descripción del formato y el número entero que identifica la fecha, y devuelve una cadena de texto formateada.
		["d/m/Y", "Fecha numérica", date("d/m/Y", $timestamp)], 
		["Y-m-d", "Fecha ISO (año-mes-día)", date("Y-m-d", $timestamp)],
		["d-m-y", "Fecha con año de dos cifras", date("d-m-y", $timestamp)],
		["l, d F Y", "Día de la semana, día, mes y año", date("l, d F Y", $timestamp)],
		["D, j M Y", "Día y mes abreviados", date("D, j M Y", $timestamp)],
		["H:i:s", "Hora en formato de 24 horas", date("H:i:s", $timestamp)],
		["g:i a", "Hora en formato de 12 horas", date("g:i a", $timestamp)],
		["Y-m-d H:i:s", "Fecha y hora", date("Y-m-d H:i:s", $timestamp)],
		["z", "Día del año (de 0 a 365)", date("z", $timestamp)],
		["c", "Fecha y hora ISO 8601", date("c", $timestamp)],
];
date_default_timezone_set('Europe/London'); //Modificacion de la zona horaria a Londres

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Funciones date() y getdate()</title>
	<style>
		table { border-collapse: collapse; margin: 1em 0; }
		th, td { border: 1px solid #999; padding: .4em .8em; text-align: left; }
		th { background: #eee; }
		code { background: #f3f3f3; padding: .1em .3em; }
	</style>
</head>
<body>
	<h1>Funciones date() y getdate()</h1>
	<p>Ambas funciones usan la misma fecha y hora: <strong><?= date("Y-m-d H:i:s", $timestamp) ?></strong>.</p>

	<p>Zona horaria configurada: <strong><?= date_default_timezone_get() ?></strong>.</p>

	<h2>Formatos habituales con date()</h2>
	<p>En <code>date()</code>, cada letra de la cadena de formato representa una parte de la fecha u hora.</p>
	<table>
		<tr><th>Formato</th><th>Uso</th><th>Resultado</th></tr>
		<?php foreach ($formatos as [$formato, $uso, $resultado]): ?>
		<tr>
			<td><code><?= htmlspecialchars($formato, ENT_QUOTES, "UTF-8") ?></code></td>
			<td><?= htmlspecialchars($uso, ENT_QUOTES, "UTF-8") ?></td>
			<td><?= htmlspecialchars($resultado, ENT_QUOTES, "UTF-8") ?></td>
		</tr>
		<?php endforeach; ?>
	</table>

	<h2>Valores devueltos por getdate()</h2>
	<p><code>getdate()</code> devuelve un array asociativo con las partes de una fecha.</p>
	<table>
		<tr><th>Clave</th><th>Significado</th><th>Valor</th></tr>
		<?php foreach ($fecha as $clave => $valor): ?>
		<tr>
			<td><code><?= htmlspecialchars((string) $clave, ENT_QUOTES, "UTF-8") ?></code></td>
			<td><?= htmlspecialchars(match ($clave) {
					"seconds" => "Segundos",
					"minutes" => "Minutos",
					"hours" => "Horas",
					"mday" => "Día del mes",
					"wday" => "Día de la semana (0 = domingo)",
					"mon" => "Mes (1-12)",
					"year" => "Año",
					"yday" => "Día del año (de 0 a 365)",
					"weekday" => "Nombre del día de la semana",
					"month" => "Nombre del mes",
					"0" => "Marca de tiempo Unix",
					default => "",
			}, ENT_QUOTES, "UTF-8") ?></td>
			<td><?= htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8") ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
