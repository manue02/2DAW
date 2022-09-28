<?php
include("Datos.php");

echo "<form action='consultar.php' method='POST'>
<label for='Alumno'>Elige un alumno:</label>

  <select name='alumno'>";

foreach ($Datos as $Nombres => $ArrayNombre) {
	echo "<option>" . $Nombres  . "</option>";
}

echo "</select> 
<input type='submit' value='Consultar'>
</form>";


?>