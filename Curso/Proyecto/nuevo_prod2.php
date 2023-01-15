<?php

/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();

$CodCat = $_POST['cat'];

NuevoProducto($_POST['Nombre_id'], $_POST['Descripcion_id'], $_POST['Stock_id'], $_POST['Precio_id'], $CodCat);

function NuevoProducto($nom, $Descp, $Stock, $precio, $CodCat)
{
	include 'conexion.php';
	$sentencia = "INSERT INTO `productos`(`CodProd`, `Nombre`, `Descripcion`, `Stock`, `precio`, `CodCat`) VALUES (' ','$nom','$Descp',$Stock,$precio,$CodCat);";
	$conexion->query($sentencia) or die("Error al ingresar los datos" . mysqli_error($conexion));
}




?>



<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href = 'index.php';
</script>