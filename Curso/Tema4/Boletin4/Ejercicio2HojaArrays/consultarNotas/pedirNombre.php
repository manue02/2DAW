<?php
include("notas.php");
echo "<form action='vernotas.php' method='POST'>
	  <select name='alumno'>";
foreach ($notas as $nombreAlumno=>$arrayCalificaciones){
	echo "<option> ".$nombreAlumno."</option>";
	
}
echo "</select> 
<input type='submit' value='Consultar'>
</form>";

?>