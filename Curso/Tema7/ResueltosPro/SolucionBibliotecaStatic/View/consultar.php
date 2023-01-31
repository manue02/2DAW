<?php
include('funciones.php');
cabecera('Gestión de LIbros');
echo "<h1>Búsquedas</h1>";
echo '
<form action="listalibros.php" method="post">
<p>Mostrar los libros según el siguiente criterio:<br />
';
echo "<table border='1'><tr><td>". " Por Autor"."</td>";
	echo "<td><select name=aid>";
	echo "<option selected value='0'>Seleccione..</option>";
	foreach ($autores as $id=>$nombre){

		echo "<option value=$id>$nombre</option>";
	}
    echo "</td></select></tr>";
    echo "<tr><td>". " Por idioma"."</td>";
  echo "<td><select name=lid>";
	echo "<option selected value='0'>Seleccione..</option>";
	foreach ($idiomas as $id=>$nombre){

		echo "<option value=$id>$nombre</option>";
	}
 
  echo "<tr><td>". " Por Editorial"."</td>";
  	echo "<td><select name=eid>";
	echo "<option selected value='0'>Seleccione..</option>";
	foreach ($editoriales as $id=>$nombre){

		echo "<option value=$id>$nombre</option>";
	}
	echo "</td></select></tr>";
	




echo "</td></tr><tr><td>Texto de búsqueda:</td><td><input type='text' name='texto' value='' ></td></tr></table>";
echo "<input type='submit' value='enviar'>";
echo "<input type='reset' value='borrar'>";
echo "</FORM>";
pie();
?>