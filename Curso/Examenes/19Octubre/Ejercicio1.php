<?php
include("array121.php");

//$Nombre = $_POST['Ciudades'];

$Solucion =  array();
$NotaMedia=0;

//colspan = 3
echo "<table border='1'>
 <tr>
 
 <th> Nombre Del Alumno </th>
 <th> Nota Media </th>
 <th> Aprobados </th>
 <th> Suspensos </th>";

foreach ($notas as $Nombre => $datos) {

    $Suma=0;
    $ContadorNotas=0;
    $NumAprobados=0;
    $NumSuspensos=0;

    foreach($datos as $Asignatura => $Notas){
        $ContadorNotas++;

if($Notas>= 5 ){

    $NumAprobados++;

}

else {

    $NumSuspensos++;
}

$Suma += $Notas;

$NotaMedia = $Suma /$ContadorNotas; 

$Solucion[$Nombre]['media'] = number_format($NotaMedia,2);
$Solucion[$Nombre]['aprobados']= $NumAprobados;
$Solucion[$Nombre]['suspensos']= $NumSuspensos;
asort($Solucion);


 }

 echo "<tr>
      <td>  $Nombre </td>
      <td>  $NotaMedia </td>
      <td>  $NumAprobados </td>
      <td>  $NumSuspensos </td>
    </tr>";
 
}



echo "</tr>
    </table>


    <a href='index.php'>Otra consulta</a>";
?>
