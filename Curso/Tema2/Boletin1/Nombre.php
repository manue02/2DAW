<?php

$nombre = $_POST['Nombre'] ;
$Ap1 = $_POST['Apellido1'] ;
$Ap2 = $_POST['Apellido2'] ;
$Edad = $_POST['Edad'] ;
$Domicilio = $_POST['Domicilio'] ;


echo "Me llamo " . $nombre . " " .  $Ap1 .  ", " . $Ap2 . ", tengo " . $Edad . " años y vivo en " . $Domicilio;

?>