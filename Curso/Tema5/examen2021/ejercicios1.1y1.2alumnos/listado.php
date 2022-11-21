<!-- listado.php -->
<?php header('Content-Type: text/html; charset=UTF-8');


$conexion = mysqli_connect("localhost", "root", "", "ejercicio1")
    or die("No conecta");
mysqli_set_charset($conexion, "utf8");

$sql = "SELECT localidades.nombre , propiedades.domicilio , tipos_vivienda.nombre , propiedades.precio FROM propiedades 
inner join localidades on propiedades.localidad=localidades.id 
inner join tipos_vivienda on propiedades.tipo=tipos_vivienda.id AND propiedades.vendida LIKE \'%NO%\'";

echo $sql;

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
        <tr>
            <?php


            echo "
            <td></td>
            <td></td>
            <td></td>
            <td></td>";
            ?>
        </tr>
    </table>
</body>

</html>