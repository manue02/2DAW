<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$Entrada = $_POST['Entrada'];
$Salida = $_POST['Salida'];
$Fecha = $_POST['Fecha'];
$ClaseId = $_POST['id_clase'];
$id = $_POST['no'];
$usuario = $_POST['usuario'];

echo "<pre>";
print_r($_POST);
echo "<pre>";


$consulta = "UPDATE reserva SET  horaEntrada = '$Entrada', horaSalida = '$Salida', fecha = '$Fecha' WHERE id_reserva = '$id'";

echo $consulta;

$result = mysqli_query($conexion, $consulta);

if ($result) {
    header("Location: ../menuCliente/MisReservas.php?usuario=$usuario");
} else {
    echo "Error al modificar la clase";
}

?>