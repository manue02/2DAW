<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['q'];

$consulta = "SELECT DISTINCT usuario, id_Profesor FROM profesores WHERE usuario like '%" . $nombre . "%'";

$result = mysqli_query($conexion, $consulta);

$datos = array();

while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row['usuario'];

    //QUITAR LOS REPETIDOS DEL ARRAY
    $datosSinRepetir = array_unique($datos);


}

// si no hay resultados me devuelve un 0 y si hay me devuelve un 1
if (count($datosSinRepetir) == 0) {
    $datos[] = "No hay resultados";
}

echo json_encode($datosSinRepetir);

?>