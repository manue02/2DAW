<?php
include('../View/funciones.php');
cabecera('Agenda Web');

echo "<div id=\"contenido\">\n";
echo '<table border = 2>';
echo'<thead><tr><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Direccion</th><th>Telefono</th></tr></thead>';

echo"</table>";
echo "Ningun contacto cumple las condiciones de búsqueda";
echo "</div>";
pie();

?>