<?php
$conexion = new mysqli("localhost", "root", "", "ciclos");
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

function comprobar_usuario($nombre, $clave)
{
	$bd = mysqli_connect("localhost", "root", "", "ciclos");
	$ins = "select TIPO_USU from usuarios where NOMBRE = '$nombre' 
			and PASSWORD = '$clave'";
	$bd->set_charset('utf8');
	$resul = mysqli_query($bd, $ins);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return $fila;
	} else {

		return FALSE;
	}
}


function pintarComboMensaje($arrayOpciones, $textoPrimeraOpcion, $valorPrimeraOpcion)
{

	echo "<option value='$valorPrimeraOpcion'>$textoPrimeraOpcion</option>";
	foreach ($arrayOpciones as $indice => $valor) {
		echo "<option value='" . $indice . "'>" . $valor . "</option>";
	}
}

function obtenerArrayOpciones($tabla, $guarda, $muestra)
{
	global $conexion;
	$arrayCombo = array();
	$sql = "SELECT $guarda,$muestra FROM $tabla order by $muestra";
	$resultado = mysqli_query($conexion, $sql);
	while ($row = mysqli_fetch_assoc($resultado)) {
		$indice = $row[$guarda];
		$arrayCombo[$indice] = $row[$muestra];
	}
	return $arrayCombo;
}

function ObtenerDNI($nombre)
{
	global $conexion;
	$sql = "SELECT DNI FROM usuarios WHERE NOMBRE='$nombre'";
	$resultado = mysqli_query($conexion, $sql);
	$fila = mysqli_fetch_assoc($resultado);
	return $fila['DNI'];
}

?>