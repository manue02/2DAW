<?php

include("array1.php");

echo "<form action='Consultar.php' method='POST'>";
echo "<td><select name='NombreCombo'>";

foreach ($datos as $nombre => $array) {

    echo "<option> " . $nombre . "</option>";

}

echo '<input type="submit" value="Consultar">';
echo '</form>';

?>