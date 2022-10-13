<?php
include("array.php");


echo "<table border='1'>
 <tr> 
 <th> Clave </th><br>";

foreach ($tab_persona as $Ciudad => $valorCiudad) {
echo "<tr>
      <td>  $valorCiudad </td>

    </tr>";

}

echo "</tr>
    </table>";

    
echo "<pre>";
print_r($a);
echo "<pre>";
?>
