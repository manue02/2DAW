<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es"> 
 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta> 
	<title>Actividad 1. Práctica  4</title> 
</head>
<body>
 <?php 
if ( strlen($_GET['numero'])==0 )
	{$mensaje="No has tecleado nada";
	echo $mensaje;}
else
	{
	$valor=$_GET['numero'];
	$tabla=array(0,0,0,0,0);
	$i=4;
	while ($valor>0)
	{
	$cociente=(int)($valor/10);
	$tabla[$i]=$valor-$cociente*10;
	$valor=$cociente;
	$i--;
	
	}
	print ("<table border 1><tr>");
	for ($i=0;$i<=4;$i++)
		echo "<td>".$tabla[$i]."</td>";
	print ("</tr></table>");
	}		

?>
</body>
</html> 