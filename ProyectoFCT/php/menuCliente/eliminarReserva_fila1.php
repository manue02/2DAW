<?php

// echo "<pre>";
// print_r($_GET);
// echo "<pre>";

$usuario = $_GET['usuario'];

EliminarProducto($_GET['no']);

function EliminarProducto($id)
{
    $conexion = mysqli_connect("localhost", "root", "", "proyectofct");
    $sentencia = "DELETE FROM reserva WHERE id_reserva ='" . $id . "' ";
    $conexion->query($sentencia) or die("Error al eliminar" . mysqli_error($conexion));
}


header("Location: ../menuCliente/MisReservas.php?usuario=$usuario");


?>

</html>