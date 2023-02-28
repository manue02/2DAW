
<?php
require_once("../Model/base.php");
/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/
extract($_POST);
$resultado_insercion="";
if (!isset($trabajo))
	{		$errores[]="Debe seleccionar algún curso";}
	else
		{if ($trabajo==-1)
			$errores[]="Debe especificar el curso";}
if (!isset($colores))
		{$errores[]="Debe seleccionar algún postre";}
else
	{if ( $colores[0]==-1)
		$errores[]="Selección errónea en los postres";}

if (empty($nombre))
	{$errores[]="El nombre no puede estar vacío";}

if (isset($errores))
	{$resultado_insercion=implode("<br>",$errores);}
else
	{
		$nuevoUsuario=new Persona($nombre,$trabajo,$colores);
		
		$fueBien=Base::introducirPersona($nuevoUsuario);		
		/*if ($fueBien)
			$resultado_insercion="Nuevo libro añadido";
		else 
			$resultado_insercion="Ocurrió un error en la bd";*/
		$resultado_insercion=($fueBien)?"Encuesta grabada":"Ocurrió un error en la bd";
	}
require_once("../View/mensaje_insercion.php");
?>





