
<?php
require_once('funciones.php');
cabecera('Alta de películas');
echo "<h1>Gestión de videoclub</h1>";
	echo '<form name="altapeliculas" action="introducir_peliculas.php" method="POST" >';
	echo '<table bgcolor="#E9FFFF" align=center border=2>';
	echo'<tr>';
	echo '<td align="left">Título: </td>';
	echo '<td align="left"> <input type="text" name="titulo" size=35></td></tr>';
		foreach ($arrayTareas as $key => $value) {
			foreach ($value as $valor) {
				echo "<tr><td>".$valor."</td>";
				echo "<td><select name=".$key.">";
				echo "<option value='0'>Seleccione..</option>";
				
				$duracion = miclase::obtenerPersonas($valor);

				foreach ($duracion as $key => $value) {
					foreach ($value as $Personas) {
						echo "<option value='".$Personas."'>".$Personas."</option>";
					}
				}
				echo "</td></select></tr>";
				
			}
		}

	echo '<tr><td align="left" colspan=2><input type=submit name ="Insertar" value="Insertar">';
	echo '<input type=reset value="Borrar"></td></tr></table></form>';
	pie();
?>




