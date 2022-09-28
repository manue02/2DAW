<?php
include("Datos.php");

 $Alumno = $_POST['alumno'];
 

echo  " Ciudades visitadas " . "<br>";

foreach ($Datos[$Alumno] as $asignatura => $nota) {

		echo   $nota . "<br>";


}

