<?php

include('funciones2.php');
include('conexion.php');
cabecera('Instituto');
include('bd.php');
extract($_POST);

echo "<h3>Selecciona un módulo</h3>";

echo "<form method='post' action=''>";

echo "<label>Módulos:</label><br>";
$Opciones = obtenerArrayOpciones("modulos", "COD_MODULO", "NOMBRE");

echo "<select name='modulos'>";

pintarComboMensaje($Opciones, "Todas", 0);

echo "</select><br>";
echo "<input type='submit' name='enviar' value='Aceptar'/>";
echo "</form>";

?>