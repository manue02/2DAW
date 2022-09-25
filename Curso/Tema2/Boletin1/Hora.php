
<?php	
$hh = $_POST['Hora'] ;
$mm = $_POST['Minutos'] ;
$ss = $_POST['Segundos'] ;


$sumaHora = 3600 * $hh;
$sumaMinutos = 60  * $mm;

$resultado = $sumaHora + $sumaMinutos + $ss;

echo $resultado;

?>