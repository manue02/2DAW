<?php echo "<pre>";print_r($_POST);echo "</pre>";
$base="examen"; $conexion=new mysqli ("localhost","root","",$base); $conexion->set_charset("utf8");$sentencia=$conexion->stmt_init();$sentencia->prepare("UPDATE modulos SET num_creditos=?         WHERE Departamento=? AND curso=?");$arrayCreditos=$_POST["creditos"];
foreach ($arrayCreditos as $depto=>$datos)	{ 		foreach ($datos as $curso=>$numCreditos)				$sentencia->bind_param("iss",$numCreditos,$depto,$curso);		$sentencia->execute();			}$sentencia->close();$conexion->close();header("Location:formularioactualizacionb.php");
?> 
