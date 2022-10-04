<?php

include("arrays.php");


$nombre=$_POST["Notas"];

if ($nombre=='0'){
    /* En primer lugar creo un array asociativocuyo indice será
    el nombres de la asignatura y el contenido cuantos alumnos hay, inicialmente 0 */
    
        foreach($arrayNotas as $Notas=>$arrayDatos){
            foreach ($arrayDatos as $nombreAsig=>$nota){
                if (!isset ($matriculados[$nombreAsig]))
                        $matriculados[$nombreAsig]["Aprobados"]=0;
                        $matriculados[$nombreAsig]["Suspensos"]=0;
                    }
            }	
        foreach($notas as $nombre=>$arrayDatos){
            foreach ($arrayDatos as $nombreAsig=>$nota){
               if ($nota<5)
                $matriculados[$nombreAsig]["Suspensos"]++;
               else
                $matriculados[$nombreAsig]["Aprobados"]++;
                
            }	
        }
    
        foreach ($matriculados as $asig=>$contadores){
            $cadena= "<p>Asignatura:".$asig;
            $cadena.=", Aprobados: ".$contadores["Aprobados"];
            $cadena.=", Suspensos: ".$contadores["Suspensos"]."</p>";
            echo $cadena;
        }
    }

    else{
        echo "Notas de ".$nombre;
    /*
    echo "<pre>";
    print_r($notas[$nombre]);
    echo "</pre>";
    */
    echo "<table border='1'>";
    foreach($arrayNotas as $Notas=>$arrayDatos){
        foreach ($arrayDatos[nombre] as $nombreAsig=>$nota){
         
            echo "<tr><td>".$nombreAsignatura."</td><td>".$nota."</td></tr>";

                }
     
            }

            echo "</table>";
    }

?>