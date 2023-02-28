<?php
require_once("../Model/base.php");

//crea las combos y llama a la vista

$Estudios = Base::obtenerCombo("estudios", "id", "denominacion");

require_once("../View/consultar.php");
?>