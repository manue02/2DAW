<?php

include("datos1.php");

echo "<form action='Consultar1.php' method='POST'>";
echo "<td><select name='NombreCombo'>";

$nombres = array();

foreach ($datos as $nombre => $array) {
    $nombreActual = $array[0]; // nombre actual en el array
    if (!in_array($nombreActual, $nombres)) {
        $nombres[] = $nombreActual;
        echo "<option value='$nombreActual'>$nombreActual</option>";

    }
}



echo '<input type="submit" value="Consultar">';
echo '</form>';


?>