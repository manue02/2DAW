<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ejercicio 2</title>        
       
    </head>
    <body>
	<h3 >RESULTADO DE LA CONSULTA</h3>
<?php
echo  '
    <h4 >Consultas efectuadas: '.$numvisitas.'</h4>';
    if (isset($arrayEmpleados)) 
	{



        if (count($arrayEmpleados)>0)
		{
			if ($_POST['localidad']<>'0')
			{
				echo "<h3>Localidad: ".$_POST['localidad']. " horario: ".$_POST['horario']. "</h3>" ;
			}
			else
			{
				echo "<h3>Todas las Localidades, horario: ".$_POST['horario']. "</h3>" ;
			}
			echo '<hr>';
			echo '<table border="1">';
			echo '<tr><th>Nombre: </th><th>Tipo: </th><th>Departamento </th><th>Localidad: </th><th>Horario: </th></tr>';
			for ($i = 0;$i<count($arrayEmpleados);$i++)
				{
					echo "<tr><td>".$arrayEmpleados[$i]->getNombre()."</td>";
					echo "<td>".$arrayEmpleados[$i]->getTipo()."</td>";      
					echo "<td><a href=ver_departamento.php?depto=".$arrayEmpleados[$i]->getcoddepart() ." >".$arrayEmpleados[$i]->getnomdepart()."</a></td>";       
					echo "<td>".$arrayEmpleados[$i]->getLocalidad()."</td>";              
					echo "<td>".$arrayEmpleados[$i]->getHorario()."</td>";
					echo '</tr>';
         
				}
			echo '</table>';
		}

	else
		{
            echo "No se han encontrado empleados con esos criterios<br>";
        }
    }
echo "<a href='..\Controller\consultar_empleados.php'>Otra consulta</a>";
?>