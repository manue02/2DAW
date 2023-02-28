<?php
require_once("../Model/base.php");
//crea las combos y llama a la vista
$Estudios = Base::obtenerCombo("estudios", "id", "denominacion");

$Postres = Base::obtenerCombo("postres", "id", "nombre");


require_once("../View/nuevo.php");
?>