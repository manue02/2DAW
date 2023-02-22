<?php

foreach ($productos as $unEmpleado){
	echo "<p>".$unEmpleado->codigo.",";
	echo $unEmpleado->nombre.",";
	
	echo "</p>";
}
?>