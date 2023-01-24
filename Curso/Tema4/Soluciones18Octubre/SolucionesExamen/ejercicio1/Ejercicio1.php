<?php
//ARRAY
include("array121.php");

$arrayfinal=array();
//RECORRER EL LOS ARRAYS
foreach($notas as $nombre=>$array)
{
	$contadorSuspensos=0;
	$contadorAprobados=0;
	$sumaNotas=0;
	foreach($array as $nota)
	{
		$sumaNotas=$sumaNotas+$nota;
		if ($nota>=5)
			$contadorAprobados++;
		else
			$contadorSuspensos++;
	}
	$media=$sumaNotas/($contadorAprobados+$contadorSuspensos);
	$arrayfinal[$nombre]['media']=number_format($media,2);
	$arrayfinal[$nombre]['aprobados']=$contadorAprobados;
	$arrayfinal[$nombre]['suspensos']=$contadorSuspensos;
	
}

ksort($arrayfinal);

echo "<table border='5'><tr><th>Nombre del alumno</th><th>Nota Media</th><th>Aprobados</th><th>Suspensos</th></tr>";

foreach($arrayfinal as $clave=>$valor)
{
	echo"<tr><td>".$clave."</td><td>".$valor['media']."</td><td>".$valor['aprobados']."</td><td>".$valor['suspensos']."</td></tr>";
}
echo "</table><br>";

?>