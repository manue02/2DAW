<?php $base="ejemplos"; $num_borrados=0;$conexion=mysqli_connect ("localhost","root","",$base); $conexion->set_charset("utf8");$sentencia=$conexion->stmt_init();$sentencia->prepare("DELETE FROM demo4 WHERE (DNI=?)");
foreach ($_POST['borra'] as $indice=>$valor){ 
    $sentencia->bind_param("s",$indice);	$sentencia->execute();
       
}mysqli_close($conexion); header("Location:formularioBorrado.php");

?> 