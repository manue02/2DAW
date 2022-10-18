<?php 
function mostrarVector($v){
echo "<table border='1'><tr>";
foreach ($v as $numero){
	echo "<td>$numero</td>";
}
echo "</tr></table>";
}
function generarVector(&$v,$dimension){
for ($i=0;$i<$dimension;$i++){
	$v[$i]=rand(1,15);

}

}
#main
$v1=array();
$v2=array();
generarVector($v1,10);
generarVector($v2,15);
echo "Antes de ordenar<br>";
mostrarVector($v1);
mostrarVector($v2);
$ordenado=array_merge($v1,$v2);
sort($ordenado);
echo "<br>Unidos y ordenados<br>";
mostrarVector($ordenado);
echo "<br>Sin elementos repetidos";
$ordenado_sin_repeticion=array_unique($ordenado);
mostrarVector($ordenado_sin_repeticion);
?>