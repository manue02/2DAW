<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Ejercicio 1</title>
<link href="../view/examen.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="encabezado">
<h1>Seleccione la(s) familia(s) </h1>
 <div>
<div id="contenido">
<form id="form_listado" action="mostrar.php" method="post">
<b>Familia: <br></b>
<?php 
foreach ($lasfamilias as $indice=>$valor)
{
	$codigo=$valor->getCod();
	$nombre=$valor->getNombre();
	echo "<input type='checkbox' name=cod[] value='".$codigo."'>".$nombre."<br>";	
}	
?>
<input type="submit" value="Mostrar" name="enviar"/>
</form>
</div>
</body>
</html>