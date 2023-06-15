<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['q'];

$consulta = "SELECT nombre FROM clase WHERE nombre like '%" . $nombre . "%' AND Activo='no'";

$result = mysqli_query($conexion, $consulta);

$datos = array();

while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row['nombre'];
}

if (empty($datos)) {
    $datos[] = "No hay coincidencias";
}

echo json_encode($datos);

?>