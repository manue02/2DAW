<?php 
session_start();
if (!isset ($_SESSION["cabecera"]))
	$_SESSION["cabecera"]=4;
$numero=$_SESSION["cabecera"];
echo "<h".$numero."> Ahora las cabeceras están a tamaño:h".$numero."</h".$numero.">";
$arrayTamaños=array(1=>"Encabezado 1",2=>"Encabezado 2",3=>"Encabezado 3",4=>"Encabezado 4");
echo "<form method='POST' ACTION='pag2.php'>
Nuevo tamaño:
<select name='tamaño'>";
foreach ($arrayTamaños as $indice=>$valor)
{	$cadena="<option value=$indice ";
	if ($indice==$numero){
		$cadena.=" selected ";}
		//echo  "value=$indice>$valor</option>";
	$cadena.=">$valor</option>";
		echo $cadena;
}
echo "</select><input type='submit' VALUE='Cambiar'></form>";
echo "<p><p><form method='POST' ACTION='pag3.php'>
<input type='submit' VALUE='Inicializar'></form>";
?>