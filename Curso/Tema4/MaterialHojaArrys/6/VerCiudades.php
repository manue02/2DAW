<?php
include("arrays.php");

$Nombre = $_POST['Ciudades'];


echo "Seleccion: $Nombre <br>

 Ciudades Visitadas <br>";


foreach ($arraygeneral[$Nombre] as $Ciudad => $valorCiudad) {

echo" $valorCiudad  <br>";


}




?>
