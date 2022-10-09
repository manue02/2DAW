<?php

include("arrays.php");


$nombre=$_POST["Notas"];
echo "<table border='1'>";
if ($nombre=='0'){
    
    echo "Seleccion: Todos";
    foreach($arrayNotas as $TipoCalificacion=>$arrayDatos){
		foreach ($arrayDatos as $nombreClase=>$Suspensos){

			if (!isset ($matriculados[$TipoCalificacion]))
					$matriculados[$TipoCalificacion]["Suma"]=0;
					
				}
		}		
 
        foreach($arrayNotas as $TipoCalificacion=>$arrayDatos){
            foreach ($arrayDatos as $nombreClase=>$Suspensos){

                $matriculados[$TipoCalificacion]["Suma"]+= $Suspensos;

                
            }	
        }

        foreach ($matriculados as $nombreDelaAsig=>$SumaDeSuspensos){
            
            $cadena="<tr>" .  "<td width = 130>" . $nombreDelaAsig . "</td>";
            $cadena.= "<td>" . $SumaDeSuspensos["Suma"]."</td> </tr>";
            echo $cadena;
        }
    }

    else

    {
        echo "Notas de ".$nombre;

        
        foreach($arrayNotas as $TipoCalificacion=>$arrayDatos){
    
        foreach ($arrayDatos as $nombreClase=>$Suspensos){
             
    if ($nombre == $nombreClase) {
        
        if ($Suspensos != 0) {
            echo "<tr>
            <td width = 130>  $TipoCalificacion </td>
            <td>  $Suspensos </td>
            </tr>";
        }
    }    
}
         
}
            echo "</table>";
}

?>