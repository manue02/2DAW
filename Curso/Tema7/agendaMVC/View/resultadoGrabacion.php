<?php
include('../View/funciones.php');
cabecera('Agenda Web');

echo "<div id=\"contenido\">\n";





echo "Se ha añadido el siguiente contacto:<br>";
echo '<table border = 2>';
echo '<thead><tr><th>DNI</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Direccion</th><th>Telefono</th></tr></thead>';



echo "</table>";

echo "No se ha podido grabar el contacto. Dni ya existente";
echo "</div>";
pie();

?>