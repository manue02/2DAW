<?php
require_once("../Model/base.php");
extract ($_POST);
$consultaPrincipal="SELECT encuesta.id, encuesta.nombre,estudios.denominacion as nombreEstudio FROM encuesta inner join estudios on encuesta.estudia=estudios.id ";
$where  = " WHERE true  ";
//echo $select.$from.$where;
if (isset($estudio))
	if ($estudio != -1) { 
  		$where .= " AND encuesta.estudia=$estudio";
	}
if ($nombre != "") { 
  $where .= " AND encuesta.nombre LIKE '%$nombre%'";
}
$consultaPrincipal=$consultaPrincipal.$where." order by encuesta.nombre";
//echo $consultaPrincipal;
$arrayConsulta=Base::consultaPrincipal($consultaPrincipal);
/*
echo "<pre>";
print_r($arrayConsulta);
echo "</pre>";
*/

require_once("../view/listausuarios.php");
?>