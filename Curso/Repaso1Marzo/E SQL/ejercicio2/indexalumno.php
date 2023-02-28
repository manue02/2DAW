<?php

session_start();


if ($_SESSION['tipo'] = 'L') {
    include('funciones1.php');
    cabecera('Instituto');
    echo "<h1>Bienvenid@ " . $_SESSION['usuario'] . " </h1>";

}
?>