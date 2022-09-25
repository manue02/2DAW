
<?php	

$grados = $_POST['Grados'] ;
$c = 5/9 ;

$resultado =  $c * ($grados-32);


echo round($resultado , 2);

?>