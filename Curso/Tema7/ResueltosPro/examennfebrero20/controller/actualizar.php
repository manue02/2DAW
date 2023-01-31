<?php
session_start();
require_once("../model/base.php");
$codigo=$_POST['codigo'];
$operacion=$_POST['operacion'];
if ($operacion=="Borrado")
	{
		echo ClaseExamen::borrarProducto($codigo);
	}
else
	{
		$nombre=$_POST['nombre'];
		$precio=$_POST['PVP'];
		echo ClaseExamen::ActualizarProducto($codigo,$nombre,$precio);
	}
header("Location:index1.php"); 
?>
				
					
					