<?php
include("notas.php");
$nombresAlumno=array_keys($notas);
/*
echo "<pre>";
print_r($nombresAlumno);
echo "</pre>";
*/
sort ($nombresAlumno);
echo "<form action='vernotas.php' method='POST'>
	  <select name='alumno'>";


foreach ($nombresAlumno as $nombre){
	echo "<option> ".$nombre."</option>";
	
}
echo "</select> 
<input type='submit' value='Consultar'>
</form>";

?>