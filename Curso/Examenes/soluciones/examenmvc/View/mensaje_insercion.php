<?php
require_once('..\view\funciones.php');
cabecera('Práctica 4');
echo '<h2>Resultado Inserción</h2>';
if (isset($errores))
	echo "<p class='aviso'>".$resultado_insercion."</p>";
else
	echo "<p class='correcto'>".$resultado_insercion."</p>";
pie();
?>
