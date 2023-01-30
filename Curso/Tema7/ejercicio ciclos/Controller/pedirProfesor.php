<?php


echo "<p>Nombre del profesor a consultar:</p>";

//campo de texto para el nombre del profesor
echo "<form action='visualizarModulos.php' method='post'>";
echo "<input type='text' name='nombreProfesor'>";
echo "<input type='submit' value='Ver modulos'>";
echo "</form>";

include("../View/pedirProfesor.php");
?>