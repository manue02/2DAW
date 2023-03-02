<?php
require_once("../model/base.php");
require_once("../model/linea.php");
require_once("../model/producto.php");
require_once("../model/ventas.php");


$lineas = base::obtieneLineas();
require_once("../view/parte1.php");
?>