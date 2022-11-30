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

    $conexion = mysqli_connect("localhost", "root", "", "parte2")
        or die("No conecta");
    mysqli_set_charset($conexion, "utf8");

    include("funcionesBD.php");


    ?>
    <div id="encabezado">
        <h1> Nueva venta</h1>
    </div>
    <?php
    echo "Preducto:";

    ?>

    <form method='post'>
        <fieldset>
            <legend>Cliente: </legend>
            <br>
            <?php
            $arrayLineas = obtenerArrayOpciones("clientes", "nif", "nombre");
            pintarComboMensaje($arrayLineas, "ComboClientes", "Seleccione", 0);
            ?>
            <legend>Unidades: </legend>
            <input type='text' name='unidades' /><br>
            <legend>Fecha: </legend>
            <input type='text' style='color: #F00;background-color: #ccc;' name='fecha' value='<?= date("Y/m/d") ?>' />
            <input type='submit' value='Selección' name='actualiza' />
            <input type='submit' value='cancelar' name='cancela' />
        </fieldset>


    </form>
    <?php


    extract($_POST);

    if (isset($_POST['actualiza'])) {

        if ($ComboClientes == 0) {
            echo "Debe seleccionar un cliente" . "<br>";
        }

        if ($unidades == "") {

            echo "Debe introducir una cantidad";
        }
    }

    if (isset($_POST['cancela'])) {
        header("Location:parte1.php");
    }


    if (isset($_POST["actualiza"])) {
        $hoy = date('Y-m-d');
        $cadInsert = "INSERT INTO venta_prod VALUES('" . $_POST["ComboClientes"] . "'," . $_POST["unidades"] . ",'" . $fecha . "')";
        $accion1 = $conexion->query($cadInsert);
        echo "Venta Cliente grabado";

    }



    ?>

    <br><a href="parte1.php">Página Inicial </a>
    </div>

</body>