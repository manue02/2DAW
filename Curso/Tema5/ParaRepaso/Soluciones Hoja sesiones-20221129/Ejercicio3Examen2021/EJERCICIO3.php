<?php
session_cache_limiter('nocache,private');
session_name('agregar');
session_start();
$pos=-1;
if (isset($_POST['boton']))
{
	if ($_POST['boton']=='Agregar')
	{
		if (!isset($_SESSION['modulos']))
		{
			$_SESSION['modulos']=array();
		}
		if($_POST['nombre'] != '')
		{
			if (!in_array($_POST['nombre'],$_SESSION['modulos']))
				{
					$_SESSION['modulos'][] = $_POST['nombre']; 
					
				}
			else
			{
				$pos=array_search($_POST['nombre'],$_SESSION['modulos']);
	
			}
		}
		else 	
		{
			echo 'No se ha introducido ningún módulo';
		}
	}
	else
	{
		session_destroy();
		unset($_SESSION);
	}
}
//presentamos el formulario
echo '<form  method=POST>';
echo '<table><tr><td colspan=2>';
echo 'Teclee módulo:<input name=nombre /></td></tr><tr><td>';
echo '<input type=submit name=boton value="Agregar" /></td>';
echo '<td><input type=submit name=boton value="Comenzar" /></td>';
echo '</tr></table></form>';
echo '<br/><ul>';
if (isset($_SESSION["modulos"]))
{
	
	echo 'Listado de nombres:<br/>';
	foreach ($_SESSION['modulos'] as $indice=>$modulo) 
	{
		if($pos==$indice)
				echo '<b><li>'.$modulo.'</b>';
		else
				echo '<li>'.$modulo;
	
		
	}
echo '</ul>';	
}

?>