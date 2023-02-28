<?php
require_once('funciones.php');
cabecera('Resultado de la consulta');

echo "<pre>";
print_r($Consulta);
echo "</pre>";

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nombre</th>";
echo "<th>Estudios</th>";
echo "<th>Postres</th>";
echo "</tr>";

foreach ($Consulta as $fila) {

    echo "<tr>";
    echo "<td>" . $fila->getId() . "</td>";
    echo "<td>" . $fila->getNombrePersona() . "</td>";
    echo "<td>" . $fila->getNombreTrabajo() . "</td>";
    echo "<td>" . $fila->getNombresPostres() . "</td>";
    echo "</tr>";
}


echo "</table>";


pie();
?>