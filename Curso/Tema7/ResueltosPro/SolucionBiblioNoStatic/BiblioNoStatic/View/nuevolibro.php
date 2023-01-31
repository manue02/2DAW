
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
	echo "<td><select name=autor>";
	foreach ($arrayAutor as $indice => $valor) {
 	echo "<option value='".$indice."'>".$valor."</option>";
 } 
	
  echo "</td></select></tr>";
  echo "<tr><td>". "idioma"."</td>";
  echo "<td><select name=idioma>";
  foreach ($arrayIdiomas as $indice => $valor) {
 	echo "<option value='".$indice."'>".$valor."</option>";
 } 
 		
	echo "</td></select></tr>";
	 echo "<tr><td>". "Editorial"."</td>";
  echo "<td><select name=editorial>";
  foreach ($arrayEditorial as $indice => $valor) {
 	echo "<option value='".$indice."'>".$valor."</option>";
 } 
  
  echo '<tr><td align="left">Precio: </td>';
	echo '<td align="left"> <input type="text" name="precio" ></td></tr>';
	echo '<tr><td align="left" colspan=2><input type=submit name ="Insertar" value="Insertar">';
	echo '<input type=reset value="Borrar"></td></tr></table></form>';
	
	
	pie();
?>



