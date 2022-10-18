<?php
function operacion($a,$b){
	$cuentas["suma"]=$a+$b;
	$cuentas["producto"]=$a*$b;
	$mayor=max($a,$b);
	$menor=min($a,$b);
	$cuentas["resta"]=$mayor-$menor;
	if ($menor==0)
		$cuentas["division"]="División por cero";
	else
		$cuentas["division"]=number_format($mayor/$menor,2);
	return $cuentas;
}
#############################
/*echo "<pre>";
print_r(operacion(7,3));
echo "</pre>";*/
echo "<table border='1'><tr><th colspan='5'>Números ascendente</th></tr>";
$i=5;
while ($i<9){
	$j=$i+1;
	while ($j<=9){
		echo "<tr><td>".$i.",".$j."</td>";
		$resultadosCuentas=operacion($i,$j); 
		foreach ($resultadosCuentas as $indice=>$valor){
			echo "<td>".$indice.": ".$valor."</td>";
		}
		echo "</tr>";
		$j++;
	}
	$i++;
}
echo "</table><br><br>";
echo "<table border='1'><tr><th colspan='5'>Números descendente</th></tr>";
$i=5;
$i=5;
while ($i>0){
	$j=$i-1;
	while ($j>=0){
		$resultadosCuentas=operacion($i,$j); 
		foreach ($resultadosCuentas as $indice=>$valor){
			echo "<td>".$indice.": ".$valor."</td>";
		}
		echo "</tr>";
		$j--;
	}
	$i--;
}
?>