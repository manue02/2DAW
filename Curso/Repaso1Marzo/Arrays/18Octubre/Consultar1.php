<?php

include("datos1.php");

extract($_POST);
$totalCreditos = 0;

echo "<table border=1>";
echo "<tr><th>Modulo</th><th>Calificaciones</th><th>Creditos Obtenidos</th></tr>";

foreach ($datos as $nombre => $array) {
    $nombreActual = $array[0]; // nombre actual en el array
    if ($nombreActual == $NombreCombo) {

        $modulo = $array[1];
        $calificacion = $array[2];

        foreach ($modulos as $codigo => $array) {
            if ($codigo == $modulo) {
                $nombreModulo = $array["Nombre"];
                $creditos = $array["Creditos"];
            }
        }

        echo "<tr><td>$nombreModulo</td><td>$calificacion</td><td>$creditos</td></tr>";


        $totalCreditos = $totalCreditos + $creditos;

    }


}


echo "<tr><td colspan=2>Total Creditos</td><td>$totalCreditos</td></tr>";


echo "</table>";

?>