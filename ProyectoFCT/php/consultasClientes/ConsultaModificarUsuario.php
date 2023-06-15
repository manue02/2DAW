<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Email = $_POST['Email'];
$Telefono = $_POST['Telefono'];
$Contraseña = $_POST['Contraseña'];

$consulta = "UPDATE usuarios SET nombre='$Nombre', apellidos='$Apellidos', telefono='$Telefono', contraseña='$Contraseña' WHERE Email='$Email'";

if (mysqli_query($conexion, $consulta)) {
    echo "1";
} else {
    echo "2";
}



?>