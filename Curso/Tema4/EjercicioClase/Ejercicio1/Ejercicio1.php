<?php

include("arrays.php");

echo "<table border='1'>
<th>Clave</th>
          <th colspan='2'>Valor</th>
 <tr>";
foreach ($arrayNotas as $Nombres => $Asignatura) {
	
    echo "

    <th rowspan='5'> $Nombres  </th><br> 
    <th>Clave</th>
    <th>Valor</th>
 <tr>";


	foreach ($Asignatura as $NombreAsig => $Notas) {

        echo "<tr>
        <td>  $NombreAsig </td>
        <td>  $Notas </td>
  
      </tr>";
        

}
}

echo "</tr>
    </table>";
?>