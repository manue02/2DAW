<?php
$conexion = new mysqli("localhost", "root", "", "parte2");
//Comprobar conexion
if (mysqli_connect_errno()) {
	printf("Fallo la conexion");
} else {
	//printf("Estas conectado");
}

function ejecutarConsulta($Consulta)
{
	global $conexion;
	$resultado = $conexion->query($Consulta);
	return $resultado;
}
?>