

<?php

//8. Crea pagina PHP que reciba, desde un formulario compuesto por una unica area de texto, una lista de
//alumnos y notas. Cada línea del texto recibido se referirá a un alumno. Cada línea contendrá el nombre del
//alumno y sus notas, cada uno de estos valores separados por comas. Por ejemplo, se podría enviar el texto
//siguiente:
    //Pepito Perez, 5, 7, 9, 6, 3
    //Juanita Antunez, 8, 9, 8, 1 



    echo "<form action='Tabla8.php' method='POST'>";
    echo '<align="left">Escribe la cadena de texto:';

    echo '<align="left" colspan=2><input type="submit" value="Consultar">';

    echo '</form><br>';
    
    echo '<textarea row="10" cols="80" name="texto">';




?>