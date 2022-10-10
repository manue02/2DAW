

<?php

//8. Crea pagina PHP que reciba, desde un formulario compuesto por una unica area de texto, una lista de
//alumnos y notas. Cada línea del texto recibido se referirá a un alumno. Cada línea contendrá el nombre del
//alumno y sus notas, cada uno de estos valores separados por comas. Por ejemplo, se podría enviar el texto
//siguiente:
    //Pepito Perez, 5, 7, 9, 6, 3
    //Juanita Antunez, 8, 9, 8, 1 

    $Texto = $_POST['texto'];
   
    $array = explode( '\r', $Texto );

    

    print_r($array);
    print_r($array2);
echo "<table border='1'>
 <tr>";

foreach ($array as $Valor) {
    $array2 = explode( ',', $Texto );
echo "<tr>
      <th>  $Valor </th>

    </tr>";
    $nombre = $array[0];

    foreach ($array2 as $Valor2) {
        echo "<tr>
              <th>  $Valor2</th>
              
            </tr>";
           
        }
}

    

echo "</tr>
    </table>";

?>