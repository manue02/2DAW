<?php
require_once("../model/base.php");
require_once("../view/sinProductos.php");



$lineas = base::obtieneLineas();

if (isset($_POST['enviar'])) {
    $linea = $_POST['linea'];
    $productos = base::obtieneProductos($linea);
    if (count($productos) == 0) {
        $mensaje = "No hay productos en esta linea";
        require_once("../view/sinProductos.php");
    } else {
        require_once("../view/parte2.php");
    }
} else {
    require_once("../view/parte1.php");
}


require_once("../view/parte2.php");
?>