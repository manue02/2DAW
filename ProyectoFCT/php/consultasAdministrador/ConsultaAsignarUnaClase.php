<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$Entrada = $_POST['Entrada'];
$Salida = $_POST['Salida'];
$Email = $_POST['Email'];
$Clase = $_POST['Clase'];



//consulta para sacar el id de la clase
$consulta = "SELECT id_clase FROM clase WHERE nombre = '$Clase'";
$result = mysqli_query($conexion, $consulta);
$datos = array();
while ($row = mysqli_fetch_assoc($result)) {
    $datos[] = $row['id_clase'];
}

//consulta para insertar

$consulta2 = "SELECT email FROM usuarios WHERE email = '$Email' and Activo='si'";


$resultado = mysqli_query($conexion, $consulta2);
if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $email = $fila['email'];
    $consulta = "INSERT INTO disponibilidad (id_clase, usuario, entrada, salida) VALUES ('$datos[0]', '$email', '$Entrada', '$Salida')";
    if (mysqli_query($conexion, $consulta)) {
        echo "1";
    } else {
        echo "2";
    }
}

?>