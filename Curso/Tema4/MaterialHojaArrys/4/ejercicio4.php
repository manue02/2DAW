
<span style font-family: arial; font-size: 8pt; font-weight: bold ;font-style: oblique;>frase arial</span><br>
<!--
donde pone arial, tambien debe salir con "courier","sans-serif","times","tahoma" y,"verdana"
donde pone 8 debe salir con 10,12,16,20 y 30
donde pone bold debe salir tambien normal, lo mismo con oblique
!-->

<?php

$arrayLetra= array('arial', 'Courier', 'sans-serif', 'times','tahoma','verdana');
$arrayTamaño= array(8, 10, 12, 16, 20, 30);
$arrayTipo= array(  'bold' ,'normal');
$arrayTipo2= array(  'oblique' ,'normal');
$VariableTamaño = 'px';


foreach ($arrayLetra as $TipoLetra=>$Nombre) {

    foreach ($arrayTamaño as $Tamaño) {
    
        foreach ($arrayTipo as $Negrita) {

            foreach ($arrayTipo2 as $OtroTipo) {
     
                echo  "<span style = 'font-family: $TipoLetra; 
                                      font-size: $Tamaño$VariableTamaño; 
                                      font-weight: $Negrita ;
                                      font-style: $OtroTipo'>Frase de prueba de fuente $Nombre</span><br>";
     
            }

        }
 

    }
}




?> 