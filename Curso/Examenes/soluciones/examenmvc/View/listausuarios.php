<?php
require_once('funciones.php');
cabecera('Resultado de la consulta');
if (empty($arrayConsulta))
	echo "Ninguna persona cumple las condiciones especificadas";
else{
?>
<table border=1>
	<tr><th>Id</th><th>Nombre</th><th>Curso</th><th>Postres</th></tr>
	<?php
	foreach ($arrayConsulta as $usuario)
		{?>
	     <tr>
	     	<td><?=$usuario->getId() ?></td>
	     	<td><?=$usuario->getNombrePersona()?></td>
	     	<td><?=$usuario->getNombreTrabajo()?></td><td>
	     <?php
	     		foreach ($usuario->getNombresPostres() as $valor)
	     			{echo $valor."<br>";}
	     ?>
	    </td> </tr>
	 <?php }
	 echo "</table>";}; 
pie();
?>





