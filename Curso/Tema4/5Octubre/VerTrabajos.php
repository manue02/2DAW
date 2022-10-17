<?php
include("ArrayTipoB.php");

extract($_POST);

 echo "Evaluados para " . $Trabajos; 

 ksort($capacidades);
$cabeceraImpresa=false;
switch ($Trabajos) {
  case $seleccion == 'Todos':


foreach ($capacidades as $Trabajador => $Contenido) {

    foreach ($Contenido as $Puesto => $Informacion) {

 
        if($Trabajos == $Puesto){
if (!$cabeceraImpresa){
        echo "<table border=1>";
        echo "<tr><th>Trabajador</th><th>Calificación</th></tr>";
        $cabeceraImpresa=true;
      }
            echo "<tr>
      <td>  $Trabajador </td>
      <td>  $Informacion </td>
    </tr>";


        }
    }
}

if ($cabeceraImpresa) 
    echo "</table>";
else  
     echo "<p>No hay datos</p>";
    break;

     case $seleccion == 'Superiores':
//------------------------------------------------------------       
foreach ($capacidades as $Trabajador => $Contenido) {

$tieneCapacidad=false;
 $tieneEstudios=false;

if (isset($Contenido[$Trabajos])){   
      $tieneCapacidad=true;
    }

        if (isset($Contenido["Estudios"]))
          $tieneEstudios=true;
        else
          $tieneEstudios=false;

        if ($tieneCapacidad && $tieneEstudios){
      if (!$cabeceraImpresa){
        echo "<table border=1>";
        echo "<tr><th>Trabajador</th><th>Calificación</th></tr>";
        $cabeceraImpresa=true;
      }
        
            echo "<tr>";
            echo "<td>".$Trabajador."</td>";
            echo "<td>".$Contenido[$Trabajos]."</td>";
            echo "</tr>";
         }           
    }


if (!$cabeceraImpresa)
    echo "<br>sin datos";

        break;
    case $seleccion == 'Bajos':
//--------------------------------------------------------------      
foreach ($capacidades as $Trabajador => $Contenido) {

$tieneCapacidad=false;
 $tieneEstudios=false;

if (isset($Contenido[$Trabajos])){   
      $tieneCapacidad=true;
    }

        if (isset($Contenido["Estudios"]))
          $tieneEstudios=false;
        else
          $tieneEstudios=true;

        if ($tieneCapacidad && $tieneEstudios){
      if (!$cabeceraImpresa){
        echo "<table border=1>";
        echo "<tr><th>Trabajador</th><th>Calificación</th></tr>";
        $cabeceraImpresa=true;
      }
        
            echo "<tr>";
            echo "<td>".$Trabajador."</td>";
            echo "<td>".$Contenido[$Trabajos]."</td>";
            echo "</tr>";
         }           
    }


if (!$cabeceraImpresa)
    echo "<br>sin datos";



        break;

}

echo "<br>
    <a href='Ejercicio1.php'>Otra consulta</a>";
?>
