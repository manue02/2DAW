<?php
include("notas.php");
$nombre=$_POST["alumno"];
if ($nombre=='0'){
/* En primer lugar creo un array con los nombres de 
las asignaturas */
	$asignaturas=array();
	foreach($notas as $nombre=>$arrayDatos){
		foreach ($arrayDatos as $nombreAsig=>$nota){
			if (!in_array($nombreAsig,$asignaturas)){
					$asignaturas[]=$nombreAsig;
				}
		}	
	}

/*a continuación recorro de nuevo el array notas para obtener
el nº de aprobados por asignatura, que los voy a meter en
un array $contadores "paralelo" a $asignaturas*/
	for ($i=0;$i<count($asignaturas);$i++){
		$contadorAprobados[$i]=0;
		$contadorSuspensos[$i]=0;
	}
	foreach($notas as $nombre=>$arrayDatos){
		foreach ($arrayDatos as $nombreAsig=>$nota){
			$posicion=array_search($nombreAsig,$asignaturas);
			if ($nota<5)
				$contadorSuspensos[$posicion]++;
			else
				$contadorAprobados[$posicion]++;
		}	
	}
	/*
	echo "<pre>";
print_r($asignaturas);
echo "</pre>";
echo "<pre>";
print_r($contador);
echo "</pre>";
*/
foreach ($asignaturas as $indice=>$asig){
	echo $asig.",".$contadorAprobados[$indice].",".$contadorSuspensos[$indice]."<br>";
}
}
else{
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
}
?>