<?php
session_start();
if (isset($_SESSION["conectado"])){
	if ($_SESSION["conectado"]=="supervisor"){

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

   /* nos envía a la siguiente dirección en el caso de no poseer autorización 
   header("location:index.php"); */

echo "<h1>Espacio supervisor</h1>";
require_once("funcionesBD.php");
$conexion=new mysqli("localhost","root","","tipob");
$conexion->set_charset("utf8");
//Obtengo el valor de la columna dni del usuario conectado
$dni=obtenerValorColumna("supervisores","nombre",$_SESSION["nombre"],"dni");
$sql = "SELECT supervisores.NOMBRE,supervisores.DNI,TRABAJOS.nombre AS TRABAJO FROM supervisores inner join trabajos on supervisores.TRABAJO=trabajos.cod_trabajo WHERE DNI='$dni'";
$resultado=$conexion->query($sql);
echo mostrarSelect($resultado);
////segunda tabla
$trabajo=obtenerValorColumna("supervisores","nombre",$_SESSION["nombre"],"trabajo");
echo "OPERACIONES DEL TRABAJO ASIGNADO<BR>";
$sql2 = "SELECT operarios.nombre, operaciones.fecha,operaciones.tiempo FROM operaciones INNER JOIN operarios ON operaciones.dni_operario=operarios.dni where operaciones.cod_trabajo=$trabajo";
$resultado2=$conexion->query($sql2);
echo mostrarSelect($resultado2);
echo '<form  action="cerrarsesion.php" method="post">
 
    
   <p> <input type="submit" value="Cerrar sesión" ></p>
 
</form>';
}
else
	header("Location: index.php");
}
else
	header("Location: index.php");
?>