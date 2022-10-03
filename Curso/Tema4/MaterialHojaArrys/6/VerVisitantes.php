<?php
include("arrays.php");

$Nombre = $_POST['Ciudad'];

echo "<table border='1'>
 <tr>
 Seleccion: $Nombre 
 <th> Visitantes </th><br>";

foreach ($arraygeneral as $Indice => $valorCiudad) {

if (in_array($Nombre , $valorCiudad)) {


    echo "<tr>
      <td>  $Indice </td>

    </tr>";

}

}

echo "</tr>
    </table>";
?>
