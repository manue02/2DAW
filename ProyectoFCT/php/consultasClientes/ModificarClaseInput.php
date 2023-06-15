<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$usuario = $_POST['usuario'];
$id_reserva = $_POST['id_reserva'];
$id_clase = $_POST['claseModificada'];


$consultaUpdate = "UPDATE reserva SET id_clase = '$id_clase' WHERE id_reserva = '$id_reserva' AND email = '$usuario'";

$resultado = mysqli_query($conexion, $consultaUpdate);

if ($resultado) {
    header("Location: ../menuCliente/MisReservas.php?usuario=$usuario");
} else {
    echo "Error al modificar la clase";
}

?>