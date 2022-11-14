<?php

$numero = $_POST['numero'];

$otro = 0;
$resultado = 0;

while ($otro < 10) {
	# code...

	$otro++;

	$resultado = $numero * $otro;

	echo $numero . "x" . $otro . "=" . $resultado . "<br>";

}


?>