<?php $base="ejemplos"; $conexion=new mysqli ("localhost","root","",$base); $conexion->set_charset("utf8");$sentencia=$conexion->stmt_init();$sentencia->prepare("UPDATE demodat2 SET Puntos=? WHERE DNI=? ");foreach ($_POST['ident'] as $indice=>$valor){ 	$sentencia->bind_param("ds",$valor,$indice);	$sentencia->execute();} mysqli_close($conexion); header("Location:formularioActualizacion.php");?> 