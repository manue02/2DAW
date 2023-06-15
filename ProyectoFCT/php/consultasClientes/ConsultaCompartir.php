<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$emailReceptor = $_POST['EmailReceptor'];
$emailEmisor = $_POST['EmailEmisor'];

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";

$cogerReservas = "SELECT * FROM reserva WHERE email = '$emailEmisor' AND compartida = 'no'";
$result = mysqli_query($conexion, $cogerReservas);

while ($row = mysqli_fetch_assoc($result)) {
    $idReserva = $row['id_reserva'];
    $horaEntrada = $row['horaEntrada'];
    $fecha = $row['fecha'];
    $horaSalida = $row['horaSalida'];
    $email = $row['email'];
    $idClase = $row['id_clase'];
    //una variable auxiliar para guardar el id de la clase y poder hacer la consulta de las reservas del emisor
    $idAuxiliar = $idClase;

    // echo "<pre>";
    // print_r($row);
    // echo "<pre>";
    // echo "///////////////////////////";
    $ReservaEmisor = "SELECT * FROM reserva WHERE id_clase  like '$idAuxiliar' AND email = '$emailReceptor'";
    // echo $ReservaEmisor;
    $result2 = mysqli_query($conexion, $ReservaEmisor);

    //si no se encuentra el id de la clase del emisor en la tabla de reservas del receptor se ejecuta la consulta
    if (mysqli_num_rows($result2) == 0) {
        $consulta = "INSERT INTO reserva (id_reserva, horaEntrada, fecha, horaSalida, email, id_clase , compartida,EmailEmisor) VALUES ('', '$horaEntrada', '$fecha', '$horaSalida', '$emailReceptor', '$idClase', 'si' , '$emailEmisor')";
        $result3 = mysqli_query($conexion, $consulta);
    }



}

if ($result3) {
    header("Location: ../menuCliente/FormularioCompartirLista.php?usuario=$emailEmisor");
} else {
    echo "Error al modificar la clase";
}

?>