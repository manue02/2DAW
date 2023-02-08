<?php
include "conexion.php";
require_once 'bd.php';
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
comprobar_sesion();



$nombre = $_POST['Nombre_id'];
$descripcion = $_POST['Descripcion_id'];
$stock = $_POST['Stock_id'];
$precio = $_POST['Precio_id'];
$NombreCat = $_POST['cod'];



NuevoProducto($nombre, $descripcion, $stock, $precio, $NombreCat);

?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href = 'categorias.php';
</script>