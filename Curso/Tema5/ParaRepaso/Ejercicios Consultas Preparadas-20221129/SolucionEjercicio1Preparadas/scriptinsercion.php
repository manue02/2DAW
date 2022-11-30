
<?php 
include('funciones.php');
cabecera('Resultado de la inserción');
echo "<div id=\"contenido\">\n";
/* Así tenemos en la variable $lafecha la fecha introducida en meter_faltas.php
en el formato para grabarlo correctamente en mysql:

echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
$lafecha=date ("Y-m-d", mktime (0, 0, 0, $_POST['dia'],$_POST['mes'],$_POST['anno']));
$arrayClaves=$_POST["inserta"];
$contadorAltas=0;
$conexion=new mysqli("localhost","root","","examen2");
//para los Inserts
$sentenciaInsert=$conexion->stmt_init();
$cadInsert="INSERT INTO faltas VALUES(?,'$lafecha')";
$sentenciaInsert->prepare($cadInsert);
//para las Select
$sentenciaSelect=$conexion->stmt_init();
$cadSelect="SELECT COUNT(*) FROM faltas WHERE id_alum=? AND fecha= '$lafecha'";
$sentenciaSelect->prepare($cadSelect);
foreach ($arrayClaves as $clave=>$valor)
{
	$sentenciaSelect->bind_param('i',$clave);
	$sentenciaSelect->execute();
	$sentenciaSelect->bind_result($numfilas);
	$sentenciaSelect->fetch();
	if ($numfilas==0)
	{
		$contadorAltas++;
		$sentenciaInsert->bind_param('i',$clave);
		$sentenciaInsert->execute();
	}
}
echo "Se grabaron $contadorAltas filas";
echo "</div>";
pie();

?>
