<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$correo = $_POST['q'];

$consulta = "SELECT email FROM usuarios WHERE email like '%" . $correo . "%' AND Activo='no'";

$result = mysqli_query($conexion, $consulta);

$datos = array();

while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row['email'];
}

if (count($datos) == 0) {
    $datos[] = "No hay resultados";
}

echo json_encode($datos);

?>