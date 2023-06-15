<?php

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$telefono = $_POST['Telefono'];
$correo = $_POST['Email'];
$contrasena = $_POST['Contraseña'];
$tarifa = $_POST['Tarifa'];

echo "<pre>";
print_r($_POST);
echo "<pre>";

function buscaRepetido($conexion, $correo)
{
    $sql = "SELECT * FROM usuarios WHERE email='$correo'";
    $result = mysqli_query($conexion, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return 1;
    } else {
        return 0;
    }
}


if (buscaRepetido($conexion, $correo) == 1) {
    echo 2;
} else {
    $consulta = "INSERT INTO usuarios (email, contraseña, nombre, apellidos, telefono, tarifa, ID_rol, Activo) VALUES ('$correo', '$contrasena', '$nombre', '$apellidos', '$telefono' , '$tarifa' , 2, 'Si')";
    echo $result = mysqli_query($conexion, $consulta);

}
?>