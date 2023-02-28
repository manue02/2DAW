<?php
session_start();
require_once("../model/base.php");
$codigo = $_POST['cod'];
$cadena='(';
foreach ($codigo as $indice=>$valor)
{									
					$cadena.="'".$valor."',";									
}
$cadena=substr($cadena,0,strlen($cadena)-1);
$cadena.=')';
$losarticulos= ClaseExamen::obtieneProductos($cadena);
if (count($losarticulos)==0)
	{
		$_SESSION['consu_familias']=$codigo;
		require_once ("../view/sin_datos.php");
		
	}
else
		require_once("../view/mostrar_datos.php");
?>
		