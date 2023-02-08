<?php
//comprueba que el usuario haya abierto sesión o redirige/
require_once 'sesiones.php';
comprobar_sesion();
echo "<pre>";
print_r($_POST);
echo "</pre>";


$cod = $_POST['cod'];
$precio = $_POST['precio'];
$unidades = (int) $_POST['unidades'];
////si existe el código sumamos las unidades/
if (isset($_SESSION['carrito'][$cod])) {
	$_SESSION['carrito'][$cod]["1"] += $unidades;
	$_SESSION['carrito'][$cod]["2"] += $precio * $unidades;
} else {
	$_SESSION['carrito'][$cod]["1"] = $unidades;
	$_SESSION['carrito'][$cod]["2"] = $precio * $unidades;
}
echo "<pre>";
print_r($_SESSION['carrito']);
echo "</pre>";
header("Location: carrito.php");

?>