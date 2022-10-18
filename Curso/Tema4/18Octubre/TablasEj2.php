<?php
include("datos2.php");

extract($_POST);


if ($orden == 'A') {
  
  $keys = array_column($datos, 'edad');
array_multisort($keys, SORT_DESC, $datos);
}

if ($orden == 'D') {
 $keys = array_column($datos, 'edad');
array_multisort($keys, SORT_ASC, $datos);
}


if($seleccion_sexo == 0){


echo "<table border='1'>
 <tr>
 <th> Sexo:Todos </th>
 <th> Orden:Ascendente </th>
 </tr>";

echo "
 <tr>
  <th>  Nombre </th>
<th>  Edad </th>
 </tr>";

foreach ($datos as $Indice => $Datos) {
   $Nombre = $Datos["nombre"];
     $Edad = $Datos["edad"];


echo "
 <tr>
  <td>  $Nombre </td>
<td>"  . $Edad  . " </td>
 </tr>"
 ;

}

echo "</table>";

}

 if($seleccion_sexo == 'M'){


echo "<table border='1'>
 <tr>
 <th> Sexo:Mujeres </th>
 <th> Orden:Ascendente </th>
 </tr>";

echo "
 <tr>
  <th>  Nombre </th>
<th>  Edad </th>
 </tr>";

foreach ($datos as $Indice => $Datos) {
   $Nombre = $Datos["nombre"];
     $Edad = $Datos["edad"];
    $Sexo = $Datos["sexo"];

if ($Sexo == 'M') {

 echo "
 <tr>
  <td>  $Nombre </td>
<td>"  . $Edad  . " </td>
 </tr>"
 ;
}



}

echo "</table>";

}


 if($seleccion_sexo == 'H'){


echo "<table border='1'>
 <tr>
 <th> Sexo:Hombres </th>
 <th> Orden:Ascendente </th>
 </tr>";

echo "
 <tr>
  <th>  Nombre </th>
<th>  Edad </th>
 </tr>";

foreach ($datos as $Indice => $Datos) {
   $Nombre = $Datos["nombre"];
     $Edad = $Datos["edad"];
    $Sexo = $Datos["sexo"];

if ($Sexo == 'H') {

 echo "
 <tr>
  <td>  $Nombre </td>
<td>"  . $Edad  . " </td>
 </tr>"
 ;
}

}

echo "</table>";

}

?>
