<?php
session_start();
if (isset($_POST["Borrar"])){
	unset($_SESSION);
	session_destroy();
}
	
if (!isset($_SESSION["nombre"]))
	$inicial="";
else
	$inicial=$_SESSION["nombre"];
echo "<table><form  method=post action='sesiones2.php'>
<tr><Td>Nombre Actual....</td><td><input type='text' name='nombre' value='$inicial'></td></tr>
<tr><td colspan=2 align=center><br><input type=submit value='Enviar'></td></Tr>
</form></table>";

?>