<?php
include "conexion.php";
require_once 'bd.php';
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
comprobar_sesion();

echo "<pre>" . var_dump($_POST) . "</pre>";

$nombre = $_POST['Nombre_id'];
$descripcion = $_POST['Descripcion_id'];
$stock = $_POST['Stock_id'];
$precio = $_POST['Precio_id'];
$NombreCat = $_POST['cod'];

//consulta para buscar el condigo de la categoria
$sql = "SELECT  CodCat  FROM `categoria` WHERE Nombre = '$NombreCat'";

$codigo = mysqli_query($conexion, $sql);

$codigo = mysqli_fetch_array($codigo);

$codigo = $codigo['CodCat'];

NuevoProducto($nombre, $descripcion, $stock, $precio, $codigo);

?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href = 'categorias.php';
</script>