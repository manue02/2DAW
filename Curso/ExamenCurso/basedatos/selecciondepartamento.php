<?php

include("funcionesBD.php");

$arraydeOpciones = obtenerArrayOpciones('modulos', 'curso', 'departamento');

?>
<html>

<head>
	<title> Gestión de aulas </title>
</head>

<body>
	<h1>Gestión de aulas</h1>

	<?php


	echo "<form method='POST' action='seleccionmodulo.php'>";

	pintarCombo($arraydeOpciones, 'departamento');

	echo "<pre>";
	print_r($arraydeOpciones);
	echo "</pre>";



	echo '<table border="0"><tr><td>';

	echo '<input type="submit" name="submit" value="Enviar" ';
	echo '</td></tr></table></form> ';
	?>
</body>

</html>