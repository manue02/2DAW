<?php
include("Datos.php");

 $Alumno = $_POST['alumno'];
  $Media = 0;
  $suma = 0;
  $Contador = 0;


 echo "<h1>Los datos del alumno: '$Alumno' </h1>";


foreach ($Datos[$Alumno] as $asignatura => $nota) {

		echo  " La asugnatura " . $asignatura . " la nota " . $nota . "<br>";
	$suma =$suma + $nota;
	$Contador++;

}

$Media = $suma / $Contador;

echo $Media;

?>