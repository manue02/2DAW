<?php
include("array1.php");

//traer el nombre del alumno seleccionado en el combo

$nombre = $_POST['Datos'];

//mostrar los datos del alumno seleccionado

echo "<h1>Datos del alumno $nombre</h1>";


echo "<table border='1'>";
echo "<tr><th>Sexo</th><th>Edad</th><th>Idiomas</th></tr>";
echo "<tr>";
echo "<td>" . $datos[$nombre]['sexo'] . "</td>";
echo "<td>" . $datos[$nombre]['edad'] . "</td>";
echo "<td>";
foreach ($datos[$nombre]['idiomas'] as $idioma) {
    echo $idioma . "<br>";
}
echo "</td>";
echo "</tr>";
echo "</table>";

?>