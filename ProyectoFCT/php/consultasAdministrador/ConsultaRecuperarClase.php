<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['NombreRecuperarClase'];

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "<pre>";



$consulta2 = "select nombre from clase where nombre='$nombre' and Activo='no'";
//echo $consulta;
$resultado = mysqli_query($conexion, $consulta2);
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombre = $fila['nombre'];
    $consulta = "UPDATE clase SET Activo='si' WHERE nombre='$nombre' and Activo='no'";
    if (mysqli_query($conexion, $consulta)) {
        echo "1";
    } else {
        echo "2";
    }
}



?>