<?php

require_once("../model/base.php");
require_once("../model/familia.php");
require_once("../model/producto.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio 1</title>
    <link href="../view/examen.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="encabezado">
        <h2>Productos de las familias:</h2>
    </div>
    <div id="contenido">
        <table border="1">
            <Tr>
                <th>Familia</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Editar</th>
                <th>Borrar</th>

                <?php


                foreach ($obtenerProductos as $Productos) {

                    echo "<tr>";
                    echo "<td>" . $Productos->getFamilia() . "</td>";
                    echo "<td>" . $Productos->getNombre() . "</td>";
                    echo "<td>" . $Productos->getPrecio() . "</td>";
                    echo "<td><a href='editar.php?cod=" . $Productos->getCod() . "'>Editar</a></td>";
                    echo "<td><a href='borrar.php?cod=" . $Productos->getCod() . "'>Borrar</a></td>";
                    echo "</tr>";
                }


                ?>

            </Tr>
        </table>
    </div>
</body>

</html>