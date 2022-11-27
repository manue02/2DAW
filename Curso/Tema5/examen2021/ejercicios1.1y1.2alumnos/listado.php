<!-- listado.php -->
<?php header('Content-Type: text/html; charset=UTF-8');
extract($_POST);

include('funcionesBd.php');

$conexion = mysqli_connect("localhost", "root", "", "ejercicio1")
    or die("No conecta");
mysqli_set_charset($conexion, "utf8");




$select = "SELECT localidades.nombre as nombre, propiedades.domicilio as domicilio, tipos_vivienda.nombre as vivienda , propiedades.precio as precio ";
$from = " FROM propiedades inner join localidades on propiedades.localidad=localidades.id inner join tipos_vivienda on propiedades.tipo=tipos_vivienda.id";
$where = " WHERE true  ";

if ($comboLocalidades != 0) {
    $where .= " AND localidades.nombre LIKE '%$comboLocalidades%'";
}

echo $select . $from . $where;

$orderby = "  AND propiedades.vendida LIKE '%NO%' ORDER BY precio ASC";
$sql = $select . $from . $where . $orderby;

//echo $sql;

$resultado = mysqli_query($conexion, $sql);


?>
<html>

<head>
    <title> lista propiedades </title>
</head>

<body>
    <h1>Gestión de Inmuebles</h1>
    <p><a href="inmuebles.php">Nueva búsqueda</a></p>
    <table border="1">
        <tr>
            <th>Localidad</th>
            <th>Domicilio</th>
            <th>Tipo de Vivienda</th>
            <th>Precio</th>
        </tr>
        <?php

        while ($fila = mysqli_fetch_assoc($resultado)) {
            extract($fila);


            echo ' <tr>
            <td>' . $nombre . '</td>
            <td> ' . $domicilio . '</td>
            <td> ' . $vivienda . '</td>
            <td> ' . $precio . '</td>
        </tr>';
        }





        ?>
    </table>


</body>


</html>