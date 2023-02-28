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
<h2>Productos de las familias:</h2>
</div>
<div id="contenido">
<table border="1"><Tr><th>Familia</th><th>Nombre</th><th>Precio</th><th>Editar</th><th>Borrar</th>
<?php
foreach ($losarticulos as $indice=>$valor)
{
	echo '<form id="form" action="editar.php" method="post">';
	echo "<input type='hidden' name='cod' value='".$valor->getCod()."'/>";
	echo "<tr><td>".$valor->getFamilia()."</td><td>".$valor->getNombre()."</td><td>".$valor->getPrecio() ;
	echo "</td><td><input type='submit' value='X' name='edit'/>";
	echo "</td><td><input type='submit' value='X' name='borra'/></tr>";
	echo "</form>";
}
?>
</table></div>
</body>
</html>