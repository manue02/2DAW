<?php

include("arrays.php");

/*
echo "<pre>";
print_r($nombresAlumno);
echo "</pre>";
*/

foreach($arrayNombres as $Familia=>$ArrayTipo){
    
 
    echo "<li>".$nombreFamilia;
    echo "<ul type='circle'>";

    foreach ($ArrayTipo as $nombreTipo=>$Nombre){

        if (is_array($Nombre))
        {

            echo "<li>Hijos";
            echo "<ol>";

        foreach ($Nombre as $Indice=>$NombreHijos){
        
            {
             echo "<li>".$NombreHijos;
            }       
            echo "</ol>";
            
           }
        }
           else
           {
           echo "<li>".$nombreTipo.": ".$Nombre;
           }
           
    }
       echo "</ul>";
}
   echo "</ul>"; 

?>