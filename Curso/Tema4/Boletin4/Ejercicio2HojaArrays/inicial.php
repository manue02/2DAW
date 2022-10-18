<?php 
include("notas.php");
/*
echo "<pre>";
print_r($notas);
echo "</pre>";
*/
foreach ($notas as $nombreAlumno=>$arrayCalificaciones){
	echo "<p>Notas de: ".$nombreAlumno."<br>";
	foreach ($arrayCalificaciones as $asignatura=>$calificacion){
		echo $asignatura.": ".$calificacion."<br>";
	}
	echo "--------------------------------</p>";
}
?>