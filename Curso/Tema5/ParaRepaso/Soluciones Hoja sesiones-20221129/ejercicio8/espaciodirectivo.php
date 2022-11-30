<?php
session_start();
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
if (isset($_SESSION["conectado"])){
	if ($_SESSION["conectado"]=="directivo"){

echo "<h1>Espacio directivo</h1>";

require_once("funcionesBD.php");
$conexion=new mysqli("localhost","root","","tipob");
$conexion->set_charset("utf8");
//Obtengo el valor de la columna dni del usuario conectado
$dni=obtenerValorColumna("directivos","nombre",$_SESSION["nombre"],"dni");
$sql = "SELECT * FROM directivos  WHERE DNI='$dni'";
$resultado=$conexion->query($sql);
echo mostrarSelect($resultado);

echo "</p><p>Opciones Disponibles:<br><ul>";



/////////
echo '<form  action="asignar.php" method="post">
 //pintar combos
    
   <p> <input type="submit" value="Asignar Trabajo" ></p>
 
</form>';
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