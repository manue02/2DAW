<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$email = $_POST['EmailUsuarioRecuperar'];

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "<pre>";

$consulta2 = "SELECT email FROM usuarios WHERE email = '$email' and Activo='no'";

$resultado = mysqli_query($conexion, $consulta2);
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $email = $fila['email'];
    $consulta = "UPDATE usuarios SET Activo='si' WHERE email='$email'";
    if (mysqli_query($conexion, $consulta)) {
        echo "1";
    } else {
        echo "2";
    }
}

?>