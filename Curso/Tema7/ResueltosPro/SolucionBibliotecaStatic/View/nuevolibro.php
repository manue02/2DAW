
<?php
require_once('funciones.php');
cabecera('Alta de Libros');


	echo '<form name="altapeliculas" action="introducir_libros.php" method="POST" >';
	echo '<table bgcolor="#E9FFFF" align=center border=2>';
	echo'<tr>';
	echo "<td colspan='2' align='center'>Introduzca el nuevo libro:</td></tr>";
	echo '<tr><td align="left">Título: </td>';
	echo '<td align="left"> <input type="text" name="titulo"></td></tr>';
	echo "<tr><td>". "Autor"."</td>";
	echo "<td><select name=aid>";
	echo "<option selected value='0'>Seleccione..</option>";
	foreach ($autores as $id=>$nombre){

		echo "<option value=$id>$nombre</option>";
	}
    echo "</td></select></tr>";
    echo "<tr><td>". "idioma"."</td>";
    echo "<td><select name=lid>";
  foreach ($idiomas as $id=>$nombre){
        $cadena= "<option ";
		if ($nombre=="Español")
			$cadena.=" selected ";
		$cadena.=" value=$id>$nombre</option>";
		echo $cadena;
		
	}
 		
	echo "</td></select></tr>";
	 echo "<tr><td>". "Editorial"."</td>";
  echo "<td><select name=eid>";
 echo "<option selected value='0'>Seleccione..</option>";
  foreach ($editoriales as $id=>$nombre){
echo "<option value=$id>$nombre</option>";

	}
  echo '<tr><td align="left">Precio: </td>';
	echo '<td align="left"> <input type="text" name="precio" ></td></tr>';
	echo '<tr><td align="left" colspan=2><input type=submit name ="Insertar" value="Insertar">';
	echo '<input type=reset value="Borrar"></td></tr></table></form>';
	
	
	pie();
?>



