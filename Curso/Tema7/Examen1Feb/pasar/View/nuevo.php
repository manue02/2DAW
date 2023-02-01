<?php
require_once('..\view\funciones.php');
cabecera('Práctica 4');

echo "<div id=contenido>";
echo "<h2>Nuevo usuario</h2>";
echo '<form name="alta" action="introducir.php" method="POST" >';
echo '<table bgcolor="#E9FFFF" align=center border=2>';
echo '<tr>';
echo "<td colspan='2' align='center'>Introduzca los datos:</td></tr>";
echo '<tr><td align="left">Nombre: </td>';
echo '<td align="left"> <input type="text" name="nombre"></td></tr>';
echo "<tr><td>" . "Estudia" . "</td>";
echo "<td><select name=estudia>";
echo "<option value='Seleccione'>Seleccione</option>";
foreach ($resultado as $indice => $valor) {
	echo "<option value='" . $indice . "'>" . $valor . "</option>";
}
echo "</td></select></tr>";
echo "<tr><td>" . "Postres" . "</td>";
echo "<td><select multiple name=platos[]>";

foreach ($resultado2 as $indice2 => $valor2) {
	echo "<option value='" . $indice2 . "'>" . $valor2 . "</option>";
}

echo '<tr><td align="left" colspan=2><input type=submit name ="Insertar" value="Insertar">';
echo '<input type=reset value="Borrar"></td></tr></table></form>';
echo "</div>";

pie();
?>