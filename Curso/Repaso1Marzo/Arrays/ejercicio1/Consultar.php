<?php

include("array1.php");

extract($_POST);

echo "<table border='5'><tr><th>Nombre</th><th>Sexo</th><th>Edad</th><th colspan = '4'>Idiomas</th></tr>";



foreach ($datos as $nombre => $array) {

    if ($NombreCombo == $nombre) {

        echo "<tr><td>" . $nombre . "</td> <td>" . $array['sexo'] . "</td>  <td>" . $array['edad'] . "</td>";


        foreach ($array['idiomas'] as $NombreIdioma) {

            echo "<td>" . $NombreIdioma . "</td>";


        }
    }

}

echo "</tr></table><br>";

?>