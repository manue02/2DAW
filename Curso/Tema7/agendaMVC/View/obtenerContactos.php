<?php
include('../View/funciones.php');
cabecera('Agenda Web');

echo "<div id=\"contenido\">\n";
echo '<table border = 2>';
echo '<thead><tr><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Direccion</th><th>Telefono</th></tr></thead>';

echo "<pre> " . print_r($resultado) . " </pre>";
foreach ($resultado as $fila => $valor) {
    echo "<tr>";
    echo "<td>" . $valor->getNombre() . "</td>";
    echo "<td>" . $valor->getApellido1() . "</td>";
    echo "<td>" . $valor->getApellido2() . "</td>";
    echo "<td>" . $valor->getDireccion() . "</td>";
    echo "<td>" . $valor->getTelefono() . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "Ningun contacto cumple las condiciones de búsqueda";
echo "</div>";
pie();

?>