<?php

function comprobar_usuario($nombre, $clave)
{
	$bd = mysqli_connect("localhost", "root", "", "ciclos");
	$ins = "select DNI, NOMBRE from usuarios where NOMBRE = '$nombre' 
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


?>