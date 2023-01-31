<?php
require_once('funciones.php');
cabecera('Resultado de la consulta');
if ($nohay)
	die("Sin datos");
?>
<table border=1>
	<tr><th>Título</th><th>Autor</th><th>Idioma</th><th>Editorial</th></tr>
	<?php
	foreach ($listado as $libro)
		{?>
	     <tr>
	     	<td><?=$libro->getTitulo()?></td>
	     	<td><?=$libro->getAutor()?></td>
	     	<td><?=$libro->getIdioma()?></td>
	     	<td><?=$libro->getEditorial()?></td>
	     </tr>
	   <?php } 
echo "</table>	";
pie();
?>





