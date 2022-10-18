<?php
include("datos1.php");

$Nombre = $_POST['Modulos'];


echo "<table border='1'>
 <tr>
 Informe del alumno: $Nombre 
 <th> Modulo </th>
 <th> Calificacion </th>
 <th> Creditos ontenidos </th>";

$total =0;

	foreach ($datos as $indice => $valor) {

		if($Nombre == $valor[0]){

			$NombreAsigAlum = $valor[1];
			$Nota = $valor[2];

	foreach ($modulos as $NombreAsig => $datos) {

if($NombreAsigAlum == $NombreAsig){

	$Asignatura = $datos["Nombre"];
     $Creditos = $datos["Creditos"];
     $total = $total + $Creditos;
}

}


echo "<tr>
      <td>  $Asignatura </td>
      <td>  $Nota </td>
      <td>  $Creditos </td>
     

    </tr>";


}
}

echo "
<td colspan = '2'> Total </td> 
<td>$total </td> 


</tr>

    </table>";
?>
