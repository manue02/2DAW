<?php
require_once('..\view\funciones.php');
cabecera('Práctica 4');
echo "<pre>";
print_r($Estudios);
echo "</pre>";

echo "<div id=contenido>";
echo "<h2>Nuevo usuario</h2>";
echo '<form name="alta" action="listausuarios.php" method="POST" >';
echo '<table bgcolor="#E9FFFF" align=center border=2>';
echo '<tr>';
echo "<td colspan='2' align='center'>Búsqueda:</td></tr>";
echo '<tr><td align="left">Introduzca el Nombre o parte de él: </td>';
echo '<td align="left"> <input type="text" name="nombre"></td></tr>';
echo "<tr><td>" . "Estudia" . "</td>";
echo "<td><select name=estudia>";

foreach ($Estudios as $estudio => $valor) {
	echo "<option value='" . $estudio . "'>" . $valor . "</option>";


}


echo "</td></select></tr>";
echo '<tr><td align="left" colspan=2><input type=submit name ="Consultar" value="Consultar">';
echo '<input type=reset value="Borrar"></td></tr></table></form>';
echo "</div>";
pie();
?>