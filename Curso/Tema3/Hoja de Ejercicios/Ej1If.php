<?php

$OP1 = $_POST['Operando1'];
$OP2 = $_POST['Operando2'];
$Operacion = $_POST['Operacion'];


if ($Operacion == "Suma") {
	
	$resultadoSuma = $OP1 + $OP2;

	echo "La suma de " . $OP1 . " y " . $OP2 .  ": " . $resultadoSuma;

}

if ($Operacion == "Resta") {
	
	$resultadoResta = $OP1 - $OP2;

	echo "La resta de " . $OP1 . " y " . $OP2 .  ": " . $resultadoResta;

}

if ($Operacion == "Producto") {
	
	$resultadoMultiplicar = $OP1 * $OP2;

	echo "La Producto de " . $OP1 . " y " . $OP2 .  ": " . $resultadoMultiplicar;

}









?>