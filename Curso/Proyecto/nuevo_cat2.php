<?php


NuevoProducto($_POST['categoria_id'], $_POST['Descripcion_id']);

function NuevoProducto($nom, $Descp)
{
	include 'conexion.php';
	$sentencia = "INSERT INTO categoria (CodCat, Nombre, Descripcion) VALUES (' ', '" . $nom . "', '" . $Descp . "') ";
	$conexion->query($sentencia) or die("Error al ingresar los datos" . mysqli_error($conexion));
}
?>

<script type="text/javascript">
	alert("Producto Ingresado Exitosamante!!");
	window.location.href = 'categorias.php';
</script>