<?php

require_once("../model/base.php");
require_once("../model/familia.php");
require_once("../model/producto.php");

$ObtenerFamilia = ClaseExamen::obtieneFamilias();
// echo "<pre>";
// echo $ObtenerFamilia;
// echo "<pre>";

require_once("../view/index1.php");
?>