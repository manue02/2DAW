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
<h2>No hay artículos de la selección efectuada:</h2>
</div>
<div id="contenido">
<table border="1"><Tr><th>Familia</th></tr>
<?php
foreach ($_SESSION['consu_familias'] as $indice=>$valor)
{
echo "<tr><td>".$valor."</td></tr>";
}	
echo "</table></div></body></html>";				
unset($_SESSION);
session_destroy();
header( "refresh:5;url=index1.php" ); 						
?>
