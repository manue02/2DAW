<?php 
foreach ($_POST['borra'] as $indice=>$valor){ 
    $sentencia->bind_param("s",$indice);
       
}

?> 