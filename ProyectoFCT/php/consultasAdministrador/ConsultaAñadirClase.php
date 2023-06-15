<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['Nombre'];
$descripcion = $_POST['descripcion'];
$fecha_alta = $_POST['fecha_alta'];

$nombreImg = $_FILES['subirFoto']['name'];
$archivo = $_FILES['subirFoto']['tmp_name'];
$ruta = "assets/imgBDD";
$ruta = "../" . $ruta . "/" . $nombreImg;
move_uploaded_file($archivo, $ruta);

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "<pre>";


function buscaRepetido($conexion, $nombre)
{
    $sql = "SELECT * FROM clase WHERE nombre='$nombre'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return 1;
    } else {
        return 0;
    }
}

if (buscaRepetido($conexion, $nombre) == 1) {
    echo 2;
} else {
    $consulta = "INSERT INTO clase (nombre, descripcion, fecha_alta, fecha_baja, imagen , Activo) VALUES ('$nombre', '$descripcion', '$fecha_alta', ' ' , '$ruta' , 'si')";
    //echo $consulta;
    echo $result = mysqli_query($conexion, $consulta);
}
?>