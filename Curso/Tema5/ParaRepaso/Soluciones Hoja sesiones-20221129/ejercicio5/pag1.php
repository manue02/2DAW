<?php
session_start();
if (!isset($_SESSION["niveles"])) {
 $_SESSION["niveles"]=array("ingles"=>9, "aleman"=>3, "frances"=>7,	"ruso"=>4) ;
}
echo "<table >";
echo "<tr><th>Idioma</th><th>Nivel</th></tr>";
echo "<form action='pag2.php' method='POST'>";
foreach ($_SESSION["niveles"] as $idioma=>$nivel){
	echo "<tr><td>$idioma</th><th>$nivel</th></tr>";

}
echo "<tr><td colspan='2'><b>Menú de opciones</b></td></tr>";

echo "<tr><td colspan='2'><input type='radio' name='opcion' value=1>Añadir</td></tr>";
echo "<tr><td colspan='2'><input type='radio' name='opcion' value=2>Cambiar</td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='boton' value=Envío></td></tr></TABLE></FORM>";
?>