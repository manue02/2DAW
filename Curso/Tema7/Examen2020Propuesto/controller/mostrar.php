<?php
require_once("../model/base.php");
require_once("../model/familia.php");
require_once("../model/producto.php");


$ObtenerFamilias = $_POST['familia'];

for ($i = 0; $i < count($ObtenerFamilias); $i++) {
	$ObtenerFamilias[$i] = "'" . $ObtenerFamilias[$i] . "'";
}


$ObtenerFamilias = implode(",", $ObtenerFamilias);

// echo "<pre>";
// echo $ObtenerFamilias;
// echo "<pre>";

$obtenerProductos = ClaseExamen::obtieneProductos($ObtenerFamilias);
require_once("../view/mostrar_datos.php");




//otra formas de hacerlo
// session_start();
// require_once("../model/base.php");
// $codigo = $_POST['cod'];
// $cadena='(';
// foreach ($codigo as $indice=>$valor)
// {									
// 					$cadena.="'".$valor."',";									
// }
// $cadena=substr($cadena,0,strlen($cadena)-1);
// $cadena.=')';
// $losarticulos= ClaseExamen::obtieneProductos($cadena);
// if (count($losarticulos)==0)
// 	{
// 		$_SESSION['consu_familias']=$codigo;
// 		require_once ("../view/sin_datos.php");

// 	}
// else
// 		require_once("../view/mostrar_datos.php");


?>