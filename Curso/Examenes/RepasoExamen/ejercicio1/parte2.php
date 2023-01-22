<?php

include("..\FuncionesBD.php");
include("..\conexion.php");


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio 1</title>
    <link href="examen.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    session_start();
    if (!isset($_POST["RadioLinea"])) {

        if ($_COOKIE["contador"] > 0)
            $_COOKIE["contador"]--;
        header("location:parte1.php");

    }
    $linea = $_POST['RadioLinea'];

    $sql = "SELECT `desc_linea` FROM `lineas` WHERE `cod_linea` = $linea";

    $resultado = ejecutarConsulta($sql);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        extract($fila);
    }

    echo '<div id="encabezado">
        <h3>Consulta de la línea: ' . $desc_linea . ' </h3>
    </div>
    <div id="contenido">';


    $sql = "SELECT `cod_producto`, `descripcion`, `precio` FROM `productos` WHERE `linea_producto` = $linea";

    $resultado = ejecutarConsulta($sql);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        extract($fila);
        echo $cod_producto . ' ' . $descripcion . "   Precio: <b>" . $precio . "</b>    <a href='insertar.php'>Nueva Venta </a>" . "<br>";
    }

    //consulta de nif y nombre de clientes que han comprado productos de la linea seleccionada y la fecha de la compra y las unidades compradas
    $sql = "SELECT `venta_prod`.`nif`,`nombre`, `venta_prod`.`unidades`, `venta_prod`.`fecha` FROM `venta_prod` INNER JOIN `clientes` ON `clientes`.`nif` = `venta_prod`.`nif` INNER JOIN `productos` ON `productos`.`cod_producto` = `venta_prod`.`cod_producto` WHERE `productos`.`linea_producto` = $linea";
    //echo $sql;
    $resultado = ejecutarConsulta($sql);


    echo '<table border="1">
        <tr>
            <th>NIF</th>
            <th>Nombre</th>
            <th>Unidades</th>
            <th>Fecha</th>
        </tr>';
    while ($fila = mysqli_fetch_assoc($resultado)) {

        extract($fila);
        echo '<tr>
            <td>' . $nif . '</td>
            <td>' . $nombre . '</td>
            <td>' . $unidades . '</td>
            <td>' . $fecha . '</td>
        </tr>';
    }

    echo '</table>';



    ?>

    <a href="parte1.php">Otra Consulta </a>
    </div>