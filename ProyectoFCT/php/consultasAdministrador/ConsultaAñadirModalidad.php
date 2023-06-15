<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['NombreClase'];
$nombreModalidad = $_POST['NombreModalidad'];
$fecha_alta = $_POST['fecha_alta'];


// echo "<pre>";
// print_r($_POST);
// echo "<pre>";

// echo "<pre>";
// print_r($_FILES);
// echo "<pre>";

// cosnulta para sacar el id de la clase que se ha seleccionado en el input con el nombre de la clase
$sql = "SELECT id_clase FROM clase WHERE nombre='$nombreModalidad'";
//echo $sql;
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
$ID_clase = $row['id_clase'];

// cossulta para añadir la modalidad con el id de la clase que se ha seleccionado en el input con el nombre de a modalidad y la fecha de alta 
$consulta = "INSERT INTO modalidad (NombreModalidad, fecha_alta, ID_clase) VALUES ('$nombre', '$fecha_alta', '$ID_clase')";
//echo $consulta;
echo $result = mysqli_query($conexion, $consulta);


?>