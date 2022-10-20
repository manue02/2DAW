<?php

  $c=@mysqli_connect('localhost', 'root', '' , "ejemplos") or die ("no conecta");

//Guardar en una variable la instruccion que queremos ejecutar 


$consulta = "SELECT TITULO,TEXTO FROM noticias";

echo $consulta;


//Enviar la instruccion a MYsql

$resultado = mysqli_query($c,$consulta);

echo "<pre>";
print_r($resultado);
echo "<pre>"

$fila = myqli_fetch_row($resultado);

while ($fila ) {

echo "<p>" . $fila[0] . "," . $fila[1] . "</p>";

    $fila = myqli_fetch_row($resultado);
}


?> 
