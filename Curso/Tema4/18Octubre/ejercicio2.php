<?php 

	echo '<form method="POST" >';
	echo '<table  align=center >';
	echo'<tr>';
	echo '<td rowspan="4" align="left">Criterio: </td>';
	echo "<tr><td><input type='radio' name='seleccion_sexo' value='0' checked>Todos</td></tr>";
	echo "<tr><td><input type='radio' name='seleccion_sexo' value='M'>Mujeres</td></tr>";
	echo "<tr><td><input type='radio' name='seleccion_sexo' value='H'>Hombres</td></tr>";
	echo"<tr><td colspan='2'><hr></td></tr>";
	echo '<td rowspan="3" align="left">Orden: </td>';
	echo "<tr><td><input type='radio' name='orden' value='A' checked>Ascendente</td></tr>";
	echo "<tr><td><input type='radio' name='orden' value='D'>Descendente</td></tr>";
	
	echo '<tr><td colspan="2" align="center" ><input type=submit name ="envio" value="Consultar"></td>';
	echo '</tr></table></form>';

?>