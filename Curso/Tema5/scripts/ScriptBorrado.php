<?php 
foreach ($_POST['borra'] as $indice=>$valor){ 
     /*ejecutamos la instruccion DELETE filtrada por WHERE para que borre el registro en el que coincida DNI con el indice en demo4, y en las demás tablas 

        mysqli_query($conexion,"DELETE FROM demo4 WHERE (DNI=$indice)"); 
}

?> 