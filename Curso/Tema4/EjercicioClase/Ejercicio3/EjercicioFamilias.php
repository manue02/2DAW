<?php

include("arrayNombres.php");

/*
echo "<pre>";
print_r($nombresAlumno);
echo "</pre>";
*/

foreach($arrayNombres as $Familia=>$ArrayTipo){
    
 
    echo " <ul> <li>$Familia";

    foreach ($ArrayTipo as $nombreTipo=>$Nombre){
    if($Nombre != 1){
    echo "<dl>
        <dt>
    <ul>
    
  		<li>$nombreTipo" .  ": " . "$Nombre</li>

    </ul>
    </dt>";
    }
        foreach ($Nombre as $Indice=>$NombreHijos){
        
        echo " <dd> $Indice" . "." . "$NombreHijos </dd> ";

        }
    }

 echo "</ul> 
    </li> 
 </dl>";
}
?>