<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$clase = $_POST['q'];

$consulta = "SELECT nombre, id_clase FROM clase WHERE nombre like '%" . $clase . "%' AND Activo='si'";

$result = mysqli_query($conexion, $consulta);

$datos = array();

while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row['nombre'];
}

//si no hay datos en el array
if (count($datos) == 0) {
    $datos[] = "No hay resultados";
}


echo json_encode($datos);

?>