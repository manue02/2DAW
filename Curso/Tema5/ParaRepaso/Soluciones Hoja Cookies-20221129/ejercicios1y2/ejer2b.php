<html>
<?php
if (!empty($_POST["nombre"])){
	setcookie("usuario",$_POST["nombre"],time()+3600);	
	echo " A partir de ahora el usuario será ".$_POST["nombre"];
}
?>
<a href="ejer2a.php">Volver</a>


</body>
</html>