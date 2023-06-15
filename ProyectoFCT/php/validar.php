<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
session_start();
$_SESSION['usuario'] = $usuario;

$conexion = mysqli_connect("localhost", "root", "", "proyectofct");

$consulta = "SELECT*FROM usuarios where email='$usuario' and contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['ID_rol'] == 1) { //administrador
    header("location:admin.php");

} else
    if ($filas['ID_rol'] == 2) { //cliente
        header("location:cliente.php");
    } else {
        ?>
        <?php
        include("index.html");
        ?>
        <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
        <?php
    }
mysqli_free_result($resultado);
mysqli_close($conexion);