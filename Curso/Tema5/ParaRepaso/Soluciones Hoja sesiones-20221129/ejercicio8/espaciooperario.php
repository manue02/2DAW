<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
echo
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html> 
<head> 
<title>Roles y sesiones</title> 
</head> 

<body> ';
require_once("funcionesBD.php");

if (isset($_SESSION["conectado"])){
	if ($_SESSION["conectado"]=="operario"){
$conexion=new mysqli("localhost","root","","tipob");
$conexion->set_charset("utf8");
//Obtengo el valor de la columna función del usuario conectado
$funcion=obtenerValorColumna("operarios","nombre",$_SESSION["nombre"],"funcion");
//Obtengo el valor de la columna dni del usuario conectado
$dni=obtenerValorColumna("operarios","nombre",$_SESSION["nombre"],"dni");
//Select para obtener las operaciones del operario
$sql = "SELECT trabajos.nombre, operaciones.fecha,operaciones.tiempo FROM operaciones INNER JOIN trabajos ON operaciones.cod_trabajo=trabajos.cod_trabajo where dni_operario='$dni'";
$resultado=$conexion->query($sql);
echo "<b>Operaciones del operario:".$_SESSION["nombre"].", función: ".$funcion."</b>";
echo mostrarSelect($resultado);
echo '<form  action="cerrarsesion.php" method="post">';

   echo '<input type="submit" value="Cerrar sesión" >
 
</form>';
}
else
	header("Location: index.php");
}
else
	header("Location: index.php");
?>