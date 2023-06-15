<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$emailReceptor = $_POST['EmailReceptor'];
$emailEmisor = $_POST['EmailEmisor'];

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";


$sql = "DELETE FROM reserva WHERE email = '$emailReceptor' and compartida = 'si' and EmailEmisor = '$emailEmisor'";
$result = mysqli_query($conexion, $sql);


if ($result) {
    header("Location: ../menuCliente/EliminarListasCompartidas.php?usuario=$emailEmisor");
} else {
    echo "Error al modificar la clase";
}



?>