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

    $linea = $_POST['RadioLinea'];

    $sql = "SELECT `desc_linea` FROM `lineas` WHERE `cod_linea` = $linea";
    $resultado = ejecutarConsulta($sql);
    $fila = mysqli_fetch_assoc($resultado);
    extract($fila);

    $codigo = $_GET["codigo"];
    $nombreproducto = obtenerValorColumna("productos", "cod_producto", $codigo, "descripcion");

    ?>


    <div id='encabezado'>
        <h1> Nueva venta</h1>
    </div>
    <h2>Producto: <?php $nombreproducto ?> </h2>
    <form method='post'>
        <fieldset>
            <legend>Cliente: </legend>

            <?php
            $arrayLineas = obtenerArrayOpciones("clientes", "nif", "nombre");
            pintarComboMensaje($arrayLineas, "ComboClientes", "Seleccione", 0);
            ?>

            <legend>Unidades: </legend>
            <input type='text' name='unidades' /><br>
            <legend>Fecha: </legend>
            <input type='text' style='color: #F00;background-color: #ccc;' name='fecha' value='<?= date('Y/m/d') ?>' />
            <input type='submit' value='Selección' name='actualiza' />
            <input type='submit' value='cancelar' name='cancela' />
        </fieldset>
        <form>


            <?php

            //Si le damos a cancelar nos lleva a la página inicial
            if (isset($_POST['cancela'])) {
                header("location:parte1.php");
            }

            //Debe seleccionarse algún cliente y teclear algo en unidades,  si dejo todo en blanco y pulso selección nos da error y si ya existe se hace un update de las unidades
            
            if (isset($_POST['actualiza'])) {
                $cliente = $_POST['ComboClientes'];
                $unidades = $_POST['unidades'];
                $fecha = $_POST['fecha'];
                $sql = "SELECT * FROM `ventas` WHERE `cod_linea` = $linea AND `nif` = '$cliente'";
                $resultado = ejecutarConsulta($sql);
                $fila = mysqli_fetch_assoc($resultado);
                extract($fila);
                if ($cliente == 0 || $unidades == "") {
                    echo "<p style='color:red'>Debe seleccionar un cliente y teclear algo en unidades</p>";
                } else {
                    if ($cod_linea == $linea && $nif == $cliente) {
                        $sql = "UPDATE `ventas` SET `unidades` = `unidades` + $unidades WHERE `cod_linea` = $linea AND `nif` = '$cliente'";
                        ejecutarConsulta($sql);
                        echo "<p style='color:green'>Se ha actualizado la venta</p>";
                    } else {
                        $sql = "INSERT INTO `ventas`(`cod_linea`, `nif`, `unidades`, `fecha`) VALUES ($linea,'$cliente',$unidades,'$fecha')";
                        ejecutarConsulta($sql);
                        echo "<p style='color:green'>Se ha insertado la venta</p>";
                    }
                }
            }
            ?>

            <br><a href="parte1.php">Página Inicial </a>
            </div>