<?php
session_start();
if (isset($_SESSION['usuario']) &&  isset($_SESSION['password']))
	{
	echo "<h3>usuario: ". $_SESSION['usuario']. " password: ".$_SESSION['password']."</h3>";
 }	
else 
{echo "sitio no autorizado";
	 }
	 echo '<a href="ejercicio2.php">Volver </a></br>';
?>
	 