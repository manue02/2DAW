<?php
include('../View/funciones.php');
cabecera('Agenda Web');
if ($correcto) {
    echo "<div id=\"contenido\">\n";
    echo "Se ha añadido el siguiente contacto:<br>";
    echo '<table border = 2>';
    echo '<thead><tr><th>DNI</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Direccion</th><th>Telefono</th></tr></thead>';
    echo "<tr>";
    echo "<td>" . $Contacto->getDni() . "</td><td>" . $Contacto->getNombre() . " </td><td>" . $Contacto->getApellido1() . "</td><td>" . $Contacto->getApellido2() . "</td><td>" . $Contacto->getDireccion() . "</td><td>" . $Contacto->getTelefono() . "</td>";
    echo "</tr>";
    echo "</table>";
} else {
    echo "No se ha podido grabar el contacto. Dni ya existente";
}
echo "</div>";
pie();

?>