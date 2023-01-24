<?php
include("array1.php");



//obtener un listado ordenado de todos los idiomas sin repetir

$idiomas = array();
foreach ($datos as $key => $value) {
    foreach ($value['idiomas'] as $key2 => $value2) {
        $idiomas[] = $value2;
    }
}
$idiomas = array_unique($idiomas);
sort($idiomas);


echo "  <table border='1'>";
foreach ($idiomas as $key => $value) {
    echo ' <tr>';
    echo "  <td> $value </td>";
    echo "  </tr>";
}
echo "</select> <br>";

echo "</table>";









?>