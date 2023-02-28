<!-- listado.php -->
<?php header('Content-Type: text/html; charset=UTF-8');
include("conexion.php");
include("..\FuncionesBD.php");

?>
<html>

<head>
    <title> lista propiedades </title>
</head>

<body>

    <?php

    //recogemos los datos del formulario
    $localidad = $_POST["localidad"];
    $minimo = $_POST["minimo"];
    $maximo = $_POST["maximo"];
    $tipoVivienda = $_POST["vivienda"];
    $Ordenacion = $_POST["orden"];


    //consulta que muestre la localidad, el domicilio, el tipo de vivienda y el precio de las propiedades que esten a la venta
    $select = "SELECT localidades.nombre as nombre, propiedades.domicilio as domicilio, tipos_vivienda.nombre as vivienda , propiedades.precio as precio ";
    $from = " FROM propiedades , localidades , tipos_vivienda";
    $where = " WHERE true AND propiedades.localidad=localidades.id AND propiedades.tipo=tipos_vivienda.id ";
    $orderby = "  AND propiedades.vendida LIKE '%NO%'";

    if ($Ordenacion == 1) {
        $orderby .= "  ORDER BY precio ASC";
    } else {
        $orderby .= "  ORDER BY precio DESC";
    }
    if ($localidad == 0) {
        $where .= " AND true ";
    } else

        if ($localidad != 1) {

            $where .= "  AND localidades.id LIKE '%$localidad%'";

        } else {
            $where .= " AND true ";
        }

    //si no se ha seleccionado ningun tipo de vivienda se muestran todas
    
    if (empty($tipoVivienda)) {
        $where .= " AND tipos_vivienda.id in (2,5,4,8,3,6,7,1) ";
    } else {

        $where .= " AND tipos_vivienda.id in (";
        foreach ($tipoVivienda as $valor => $idPro) {
            $where .= $idPro . ",";
        }
        $where = substr($where, 0, -1);
        $where .= ")";
    }
    $where .= " AND precio BETWEEN $minimo AND $maximo";

    $sql = $select . $from . $where . $orderby;

    $resultado = ejecutarConsulta($sql);

    //echo $sql;
    
    ?>
    <h1>Gestión de Inmuebles</h1>
    <p><a href="inmuebles.php">Nueva búsqueda</a></p>
    <table border="1">
        <tr>
            <th>Localidad</th>
            <th>Domicilio</th>
            <th>Tipo de Vivienda</th>
            <th>Precio</th>
        </tr>
        <tr>

            <?php

            while ($fila = mysqli_fetch_array($resultado)) {

                echo "<tr>";
                echo "<td>" . $fila["nombre"] . "</td>";
                echo "<td>" . $fila["domicilio"] . "</td>";
                echo "<td>" . $fila["vivienda"] . "</td>";
                echo "<td>" . $fila["precio"] . "</td>";
                echo "</tr>";

            }





            ?>

        </tr>


    </table>
</body>

</html>