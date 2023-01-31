<?php
session_start();
require_once("../model/base.php");

if (isset($_POST['cod'])) {
    $codigo = $_POST['cod'];
    $producto_actual = ClaseExamen::obtieneProducto($codigo);
    $operacion = (isset($_POST["edit"])) ? "Edición" : "Borrado";
    require_once("../view/editar.php");
}
?>