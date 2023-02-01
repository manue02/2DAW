<?php
require_once('funciones.php');
cabecera('Resultado de la consulta');


// echo "<pre> ";
// echo print_r($resultado);
// echo " </pre> <br>";
echo "<div id=\"contenido\">\n";
echo '<table border = 2>';
echo '<thead><tr><th>ID</th><th>Nombre</th><th>Curso</th><th>Postres</th></thead>';
foreach ($resultado as $fila => $valor) {
    echo "<tr>";
    echo "<td>" . $valor->getId() . "</td>";
    echo "<td>" . $valor->getNombrePersona() . "</td>";
    echo "<td>" . $valor->getNombreTrabajo() . "</td>";
    echo "<td>" . $valor->getNombresPostres() . "</td>";

    echo "</tr>";
}
echo "</table>";

pie();
?>