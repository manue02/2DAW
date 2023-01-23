<?xml version="1.0" encoding="iso-8859-1">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Ejercicio 1</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
  </head><body>
<?php
include("ejer2.php");
if (!isset($_POST['envio']))
{

echo "<form name='formulario' method='POST'>";
foreach ($generos as $indice=>$valor)
{echo "<input type='radio' name='seleccion' value=$indice>".$valor."<br>";
}

echo "<input type='submit' name='envio' value='consultar'></form>";
}
else
{
if (isset($_POST['seleccion']))
{
	$nombre_ingles=$_POST['seleccion'];
	$encontrado=false;
	foreach ($filmes as $titulo=>$datos){
		if ($datos["genero"]==$nombre_ingles){
			if (!$encontrado){
				$encontrado=true;
				echo "<h4>Películas de ".$generos[$nombre_ingles]."</h4>";
				echo "<TABLE BORDER=1><tr><th>Título</th><th>Fecha</th></tr>";
			}
    echo '<tr><td >'; 
    echo $titulo;
    echo '</td>';
	echo '<td >'; 
    echo $datos["fecha"];
    echo '</td></tr>';
		}
	}
	if (!$encontrado)
		echo "No hay películas del género $nombre_ingles ($generos[$nombre_ingles])";
	else
		echo "</table>";
}
else{
	echo "No has seleccionado ningún género";

}
}	
?>
</html>
</body>