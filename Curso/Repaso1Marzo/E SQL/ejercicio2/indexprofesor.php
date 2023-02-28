<?php

session_start();


if ($_SESSION['tipo'] = 'P') {
    include('funciones2.php');
    cabecera('Instituto');
    echo "<h1>Bienvenid@ " . $_SESSION['usuario'] . " </h1>";
}



?>