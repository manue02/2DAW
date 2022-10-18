<?php
include("notas.php");
$nombre=$_POST["alumno"];
echo "Notas de ".$nombre;
/*
echo "<pre>";
print_r($notas[$nombre]);
echo "</pre>";
*/
$suma=0;
$contador=0;
echo "<table border='1'>";
foreach ($notas[$nombre] as $nombreAsignatura=>$nota){
	echo "<tr><td>".$nombreAsignatura."</td><td>".$nota."</td></tr>";
	$suma=$suma+$nota;
	$contador=$contador+1;
	}
	$media=$suma/$contador;
echo "<tr><td>Nota Media</td><td>".number_format($media,2)."</td></tr></table>";
?>