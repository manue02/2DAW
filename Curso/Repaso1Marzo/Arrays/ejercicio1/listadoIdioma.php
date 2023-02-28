<?php

include("array1.php");

$idiomas = array();
echo "<table border='5'><tr><th>Idiomas</th></tr>";

foreach ($datos as $nombre => $array) {
    foreach ($array['idiomas'] as $idioma) {

        if (!in_array($idioma, $idiomas)) {
            $idiomas[] = $idioma;
            echo "<tr><td>" . $idioma . "</td></tr>";
        }

    }
}

echo "</table><br>";



?>