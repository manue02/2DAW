<?php 
session_start();
if (!isset ($_SESSION["cabecera"]))
{   echo "<a href='pag1.php'>Ir a página 1</a><br>";
	die ("acceso no autorizado");
	}
$numero=$_POST["tamaño"];	
$_SESSION["cabecera"]=$numero;
echo "<form method='POST' action='pag1.php'>";
echo "<h".$numero."> Las cabeceras se han cambiado a tamaño:h".$numero."</h".$numero."><br>";
echo "<a href='pag1.php'>Ir a página 1</a>";
?>