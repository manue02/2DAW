<?php
include("arrays.php");

$Nombre = $_POST['Ciudades'];

echo "<table border='1'>
 <tr>
 Seleccion: $Nombre 
 <th> Ciudad Visitada </th><br>";

foreach ($arraygeneral[$Nombre] as $Ciudad => $valorCiudad) {
echo "<tr>
      <td>  $valorCiudad </td>

    </tr>";

}

echo "</tr>
    </table>";
?>
