<?php
include("array.php");

$Nombre = $_POST['Ciudades'];

echo "<table border='1'>
 <tr>
 
 <th colspan = 3> Casa </th>";

foreach ($a[$Nombre] as $Ciudad => $valorCiudad) {

echo "<tr>
      <td>  $Nombre </td>
      <td>  $Ciudad </td>
      <td>  $valorCiudad </td>

    </tr>";

}

echo "</tr>
    </table>";

echo "<table border='1'>
 <tr>
 <th colspan = 3> Fuera </th><br>";

foreach ($a as $Tabla => $Contenido) {
    foreach ($Contenido as $Ciudad => $valor) {

        if($Nombre == $Ciudad){

            echo "<tr>
      <td>  $Tabla </td>
      <td>  $Nombre </td>
      <td>  $valor </td>

    </tr>";


        }
    }
}

echo "</tr>
    </table>";
echo "<br>
    <a href='index.php'>Otra consulta</a>";
?>
