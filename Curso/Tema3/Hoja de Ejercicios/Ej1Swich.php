<?php

$OP1 = $_POST['Operando1'];
$OP2 = $_POST['Operando2'];
$Operacion = $_POST['Operacion'];



switch ($Operacion) {
case 'Suma':

$resultadoSuma = $OP1 + $OP2;

	echo "La suma de " . $OP1 . " y " . $OP2 .  ": " . $resultadoSuma;

    break;

case 'Resta':

$resultadoResta = $OP1 - $OP2;

	echo "La resta de " . $OP1 . " y " . $OP2 .  ": " . $resultadoResta;

	break;

case 'Producto':

$resultadoMultiplicar = $OP1 * $OP2;

	echo "El Producto de " . $OP1 . " y " . $OP2 .  ": " . $resultadoMultiplicar;

	}
?>