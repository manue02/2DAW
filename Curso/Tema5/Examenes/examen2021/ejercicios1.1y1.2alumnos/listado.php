<!-- listado.php -->
<?php header('Content-Type: text/html; charset=UTF-8');

include('funcionesBd.php');

$conexion = mysqli_connect("localhost", "root", "", "ejercicio1")
    or die("No conecta");
mysqli_set_charset($conexion, "utf8");
extract($_POST);


//

$select = "SELECT localidades.nombre as nombre, propiedades.domicilio as domicilio, tipos_vivienda.nombre as vivienda , propiedades.precio as precio ";
$from = " FROM propiedades inner join localidades on propiedades.localidad=localidades.id inner join tipos_vivienda on propiedades.tipo=tipos_vivienda.id";
$where = " WHERE true ";
$orderby = "  AND propiedades.vendida LIKE '%NO%'";




//echo $contador;

if ($orden == 1) {


    $orderby .= "  ORDER BY precio ASC";

} else {

    $orderby .= "  ORDER BY precio DESC";

}

if ($comboLocalidades != 1) {
    echo "NO ES TODAS ";

    $where = " WHERE true AND localidades.nombre LIKE '%$comboLocalidades%'";


} else {
    echo "esto es la opcion todas ";

    $where = " WHERE true ";
}

$where .= " AND tipos_vivienda.id in (";
foreach ($checkViviendas as $valor => $idPro) {
    $where .= $idPro . ",";
}
$where = substr($where, 0, -1);
$where .= ")";
$where .= " AND precio BETWEEN $minimo AND $maximo";



$sql = $select . $from . $where . $orderby;
echo $select . $from . $where . $orderby;



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

        var_dump($checkViviendas);

        ?>
    </table>


</body>


</html>