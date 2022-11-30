<html>
<?php
$spanish=array("red"=>"rojo","blue"=>"azul","green"=>"verde");

if (isset($_POST["radio"])){
	$eleccion=$_POST["radio"];
	setcookie("color",$eleccion,time()+3600);	
	echo " A partir de ahora el color será ".$spanish[$eleccion];
}
?>
<a href="ejer1a.php">Volver</a>


</body>
</html>