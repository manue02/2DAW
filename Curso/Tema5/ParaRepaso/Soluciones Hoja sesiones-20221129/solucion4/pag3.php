<?php 
session_start();
if (!isset ($_SESSION["cabecera"]))
{   echo "<a href='pag1.php'>Ir a página 1</a><br>";
	die ("acceso no autorizado");
	}
unset($_SESSION);
session_destroy();
header ("Location:pag1.php");
?>