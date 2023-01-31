<?php
require_once("../Model/base.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
extract($_POST);
$resultado_insercion="";
if ($autor==-1)
	$errores[]="Debe especificar el autor del libro";
if ($editorial==-1)
	$errores[]="Debe especificar la editorial del libro";
if ($idioma==-1)
	$errores[]="Debe especificar el idioma del libro";
if (empty($titulo))
	$errores[]="El título no puede estar vacío";
if (empty($precio))
	$errores[]="El precio no puede estar vacío";
else
	if (!is_numeric($precio))
		$errores[]="Caracteres no admitidos en el precio";
if (isset($errores))
	{$resultado_insercion=implode($errores,"<br>");}
else
	{
		$miconexion=new Base();
		$fueBien=$miconexion->introducirLibro($autor,$idioma,$editorial,$titulo,$precio);		
		/*if ($fueBien)
			$resultado_insercion="Nuevo libro añadido";
		else 
			$resultado_insercion="Ocurrió un error en la bd";*/
		$resultado_insercion=($fueBien)?"Nuevo libro añadido":"Ocurrió un error en la bd";
	}
require_once("../View/mensaje_insercion.php");
?>




