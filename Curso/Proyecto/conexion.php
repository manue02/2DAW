<?php
$conexion = new mysqli("localhost", "root", "", "pedidosejemplo");
//Comprobar conexion
if (mysqli_connect_errno()) {
	printf("Fallo la conexion");
} else {
	//printf("Estas conectado");
}
?>