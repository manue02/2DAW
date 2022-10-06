<?php

include("arrays.php");

/*
echo "<pre>";
print_r($nombresAlumno);
echo "</pre>";
*/

foreach($arrayNombres as $Familia=>$ArrayTipo){
    
 
    echo " <ul> <li>$Familia";


    foreach ($ArrayTipo as $nombreTipo=>$Nombre){
        echo "<li>$nombreTipo</li>";

     if(is_array($Nombre)){
    echo "
        <dt>
    <ul>
    
  		<li>$nombreTipo" .  ": " . "$Nombre</li>

    </ul>
    </dt>";

    
   

    
        foreach ($Nombre as $Indice=>$NombreHijos){
        
        echo " $Indice" . "." . "$NombreHijos";

        }
    }
    }
}

 echo "</ul> 
    </li>";

?>