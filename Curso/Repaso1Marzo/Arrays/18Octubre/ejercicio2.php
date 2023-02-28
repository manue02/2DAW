<?php

include("datos2.php");

echo '<form method="POST" >';
echo '<table  align=center >';
echo '<tr>';
echo '<td rowspan="4" align="left">Criterio: </td>';
echo "<tr><td><input type='radio' name='seleccion_sexo' value='0' checked>Todos</td></tr>";
echo "<tr><td><input type='radio' name='seleccion_sexo' value='M'>Mujeres</td></tr>";
echo "<tr><td><input type='radio' name='seleccion_sexo' value='H'>Hombres</td></tr>";
echo "<tr><td colspan='2'><hr></td></tr>";
echo '<td rowspan="3" align="left">Orden: </td>';
echo "<tr><td><input type='radio' name='orden' value='A' checked>Ascendente</td></tr>";
echo "<tr><td><input type='radio' name='orden' value='D'>Descendente</td></tr>";

echo '<tr><td colspan="2" align="center" ><input type=submit name ="envio" value="Consultar"></td>';
echo '</tr></table></form>';


echo "<table border=1 align=center>";



if (isset($_POST['envio'])) {

	$sexo = $_POST['seleccion_sexo'];
	$orden = $_POST['orden'];

	if ($orden == "A") {
		asort($datos);
		$orden = "Ascendente";
	} else {
		arsort($datos);
		$orden = "Descendente";
	}

	if ($sexo == "M") {
		$sexo = "Mujeres";
	} else if ($sexo == "H") {
		$sexo = "Hombres";
	} else {
		$sexo = "Todos";
	}

	echo "<tr><th>Sexo: " . $sexo . "</th><th>Orden: " . $orden . "</th></tr>";
	echo "<tr><th>Nombre</th><th>Edad</th></tr>";

	foreach ($datos as $key => $value) {

		$nombre = $value["nombre"];
		$edad = $value["edad"];
		$sexo = $value["sexo"];

		if ($_POST['seleccion_sexo'] == $sexo) {
			echo "<tr><td>$nombre</td><td>$edad</td></tr>";
		} else if ($_POST['seleccion_sexo'] == 0) {
			echo "<tr><td>$nombre</td><td>$edad</td></tr>";
		}


	}

	echo "</table>";
}
?>