<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
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
    $consulta = "INSERT INTO profesores (nombre, apellidos, usuario, id_clase) VALUES ('$nombre', '$apellidos', '$email', '$datos[0]')";
    if (mysqli_query($conexion, $consulta)) {
        echo "1";
    } else {
        echo "2";
    }
}

?>