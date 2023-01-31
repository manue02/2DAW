<?php
include('funciones.php');
cabecera('Gestión de LIbros');
echo "<h1>Búsquedas</h1>";
/*

print_r($arrayEditorial);
echo "</pre>";


*/
echo '
<form action="listalibros.php" method="post">
<p>Mostrar los libros según el siguiente criterio:<br />
';
echo "<table border='1'><tr><td>". " Por Autor"."</td>";
echo "<td><select name='autor'>";
foreach ($arrayAutor as $indice => $valor) {
 	echo "<option value='".$indice."'>".$valor."</option>";
 } 
echo "</td></select></tr>";
echo "<tr><td>". " Por idioma"."</td>";
echo "<td><select name='idioma'>";
foreach ($arrayIdiomas as $indice => $valor) {
 	echo "<option value='".$indice."'>".$valor."</option>";
 } 

echo "</td></select></tr>";
echo "<tr><td>". " Por Editorial"."</td>";
echo "<td><select name='editorial'>";
foreach ($arrayEditorial as $indice => $valor) {
 	echo "<option value='".$indice."'>".$valor."</option>";
 } 

echo "</td></select></tr>";	
echo "</td></tr><tr><td>Texto de búsqueda:</td><td><input type='text' name='texto' value='' ></td></tr></table>";
echo "<input type='submit' value='enviar'>";
echo "<input type='reset' value='borrar'>";
echo "</FORM>";
pie();
?>