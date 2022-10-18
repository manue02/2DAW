<?php 
extract($_POST);
$lineas=explode("\r",$texto);
foreach ($lineas as $datos){
	//echo $datos."<br>";
	$datosAlumno=explode(",",$datos);
	$sumaNotas=0;
	$numNotas=count($datosAlumno)-1;
	foreach ($datosAlumno as $indice=>$contenido){
		//echo $indice.",".$contenido."<br>";
		if ($indice==0){
			$nombre=$contenido;
		}
		else{
			$sumaNotas+=$contenido;
		}
	}
	$arrayAlumnos[$nombre]=$sumaNotas/$numNotas;	
}
if ($criterio=="nombre"){
	if ($orientacion=="ascendente"){
		ksort($arrayAlumnos);}
	else
	{
		krsort($arrayAlumnos);
	}
}
elseif ($orientacion=="ascendente"){
		asort($arrayAlumnos);}
	else
	{
		arsort($arrayAlumnos);
	}


echo "<table border='1'>";
foreach($arrayAlumnos as $nombre=>$media)
{
	echo "<tr><td>".$nombre."</td><td>".$media."</td></tr>";
}
echo "</table>";
?>