<?php
$arrayNotas = array
		(
		'Baja'=>array 
					('SMR'=>5,
					 'TECO'=>2),
		'Suspenso'=>array 
					('SMR'=>10,
					 'TECO'=>11,
					 'DAW'=>6,
					 'DAM'=>3),
		  
		 'Aprobado'=>array 
					('SMR'=> 6 ,
					 'TECO'=>8,
					 'DAW'=>2 ,
					 'DAM'=>5 ),
		 'Notable'=>array 
					('SMR'=> 3 ,
					 'DAW'=> 2,
					 'DAM'=> 7),
		 'Sobresaliente'=>array 
					('SMR'=> 1 ,
					 'TECO'=> 2,
					 'DAM'=> 28),
		 'Matrícula de honor'=>array 
					('DAW'=> 1 )			 
					 
		);
$arrayCiclos=array();
foreach ($arrayNotas as $calificacion=>$datos)
{
foreach ($datos as $ciclo=>$valor){
	if (!in_array($ciclo,$arrayCiclos))
	{
		$arrayCiclos[]=$ciclo;
	}
}

}
sort($arrayCiclos);	
/*
echo "<pre>";
print_r($arrayCiclos);
echo "</pre>";
echo "<pre>";
print_r($arrayNotas);
echo "</pre>";
*/
echo '<form method="POST" >';
echo '<table bgcolor="#E9FFFF" align=center border=2>';
echo'<tr>';
echo '<td align="left">Ense&ntilde;anza: </td>';
if (isset($_POST["seleccion_ciclo"]))
	$seleccionPrevia=$_POST["seleccion_ciclo"];
$mostrar=' ';
echo "<td><select name='seleccion_ciclo'>";
echo "<option value='todos'>Todos</option>";
foreach ($arrayCiclos as $indice=>$valor)
{	
			if ($valor==$seleccionPrevia)
				$mostrar='selected';
			else
				$mostrar=' ';
			echo "<option   value='".$valor."'".$mostrar.">".$valor."</option>";
}
echo '<tr><td align="left" colspan=2><input type=submit name ="envio" value="Consultar">';
echo '</td></tr></table></form>';
if (isset($_POST["envio"]))
	{$seleccionado=$_POST["seleccion_ciclo"];
	echo '<table bgcolor="#E9FFFF" align=center border=2>';
	echo '<caption> Selecci&oacuten:'.$seleccionado.'</caption>';
	echo'<tr>';
	if ($seleccionado=="todos")
		{		
		echo '<td align="left">Calificación</td><td>Alumnos</td>';		
		foreach ($arrayNotas as $indice1=>$array1)
		{
			$suma=0;
			echo'<tr>';
			echo '<td align="left">'.$indice1.' </td>';
			foreach($array1 as $valor)
			{$suma+=$valor;
			}
			echo '<td>'.$suma.'</td><tr>';
		}
		
		}
	else
		{
		echo '<td align="left">Calificación: </td><td>Alumnos</td>';	
		foreach ($arrayNotas as $indice1=>$array1)
		{
			if (isset($array1[$seleccionado]))
			{
			echo'<tr>';
			echo '<td align="left">'.$indice1.' </td>';
			echo '<td>'.$array1[$seleccionado].'</td><tr>';
		}		
		}
		echo "</table>";
		
}
}		
?>