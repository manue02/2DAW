<?php

#Para rellenar la primitiva queremos visualizar un array de seis elementos, conteniendo cada celda un
#número aleatorio comprendido entre 1 y 49 en la que habremos de evitar la posibilidad de que un número se
#repita dos veces

$numeros= range(1,49);

shuffle($numeros);

$salida = array_slice($numeros,0,6);
 
echo "<pre>";
print_r($salida);
?>