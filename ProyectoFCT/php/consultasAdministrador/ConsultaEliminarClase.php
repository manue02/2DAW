<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['Nombre'];
$fecha_baja = $_POST['fecha_baja'];

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

$consulta = "UPDATE clase SET nombre='$nombre', fecha_baja='$fecha_baja', imagen='$ruta' , Activo='no' WHERE nombre='$nombre'";
//echo $consulta;
echo $result = mysqli_query($conexion, $consulta);

?>