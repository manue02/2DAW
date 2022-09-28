
<?php

include("Datos.php");

foreach ($Datos as $Nombres => $Asignatura) {
	
	echo  "El nombre " . $Nombres . "<br>";

	foreach ($Asignatura as $NombreAsig => $Notas) {
	
	echo  " La asugnatura " . $NombreAsig . " la nota " . $Notas . "<br>";

}
echo "<br>";
}

?> 
