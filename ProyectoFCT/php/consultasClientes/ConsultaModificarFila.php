<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$Usuario = $_POST['Usuario'];
$Entrada = $_POST['Entrada'];
$Salida = $_POST['Salida'];
$Fecha = $_POST['Fecha'];
$Clase = $_POST['id_clase'];
$Usuario22 = $_GET['usuario22'];

$id = $_POST['no'];

echo "<pre>";
print_r($_POST);
echo "<pre>";

$consulta = "INSERT INTO reserva (id_reserva, horaEntrada, fecha, horaSalida, email, id_clase , compartida , EmailEmisor) VALUES ('', '$Entrada', '$Fecha', '$Salida', '$Usuario', '$Clase', 'no', '')";
$result = mysqli_query($conexion, $consulta);

if ($result) {
    header("Location: ../menuCliente/ClasesDisponibles.php?usuario=$Usuario22");
} else {
    echo "Error al modificar la clase";
}

?>