<?php
session_start();
require_once("../model/base.php");
$lasfamilias=ClaseExamen::obtieneFamilias();	
require_once("../view/index1.php");
?>
		