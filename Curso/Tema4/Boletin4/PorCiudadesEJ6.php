<?php
include("Ejercicio6.php");

echo "<form action='consultar.php' method='POST'>

<label for='Alumno'>Usuarios:</label>
 <select name='alumno'>";
foreach ($arrayciudades as $Nombres => $ArrayNombre) {
	echo "<option> ".$Nombres."</option>";
}

echo "</select> 
<br>
<input type='submit' value='ConsultarCiudadEj6'>
</form>";


?>