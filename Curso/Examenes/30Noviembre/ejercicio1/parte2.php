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


    extract($_POST);

    $sql = "SELECT productos.descripcion as Producto , productos.precio as precio FROM productos inner join lineas on lineas.cod_linea=productos.linea_producto  WHERE true AND productos.linea_producto LIKE '%$RadioLineas%'";
    $resultado = mysqli_query($conexion, $sql);
    $sql2 = "SELECT venta_prod.nif as DNI , clientes.nombre as nombre , venta_prod.unidades as unidades , venta_prod.fecha as fecha FROM venta_prod inner join clientes on clientes.nif=venta_prod.nif inner join productos on productos.cod_producto=venta_prod.cod_producto   WHERE true AND venta_prod.cod_producto = productos.cod_producto AND productos.linea_producto = $RadioLineas";
    $resultado2 = mysqli_query($conexion, $sql2);

    ?>
    <div id="encabezado">
        <h3>Consulta de la línea: </h3>
    </div>
    <div id="contenido">

        <?php

        while ($fila = mysqli_fetch_assoc($resultado)) {

            extract($fila);

            echo $Producto . "   Precio:" . $precio . "    <a href='insertar.php'>Nueva Venta </a>" . "<br>";
        }



        ?>

        <table border="1">
            <tr>
                <th>DNI</th>
                <th>nombre</th>
                <th>unidades</th>
                <th>fecha</th>
            </tr>
            <?php

            while ($fila = mysqli_fetch_assoc($resultado2)) {

                extract($fila);

                echo ' <tr>
    <td>' . $DNI . '</td>
    <td> ' . $nombre . '</td>
    <td> ' . $unidades . '</td>
    <td> ' . $fecha . '</td>
</tr>';
            }



            ?>
        </table>


        <a href="parte1.php">Otra Consulta </a>
    </div>