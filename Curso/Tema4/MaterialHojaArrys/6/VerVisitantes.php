<?php
include("arrays.php");

$Nombre = $_POST['Ciudad'];

echo "<table border='1'>
 <tr>
 Seleccion: $Nombre 
 <th> Visitantes </th><br>";

foreach ($arraygeneral[$Nombre] as $Ciudad => $valorCiudad) {
echo "<tr>
      <td>  $Ciudad </td>

    </tr>";

}

echo "</tr>
    </table>";
?>
