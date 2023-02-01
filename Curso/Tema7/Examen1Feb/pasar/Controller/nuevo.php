<?php
require_once("../Model/base.php");
//crea las combos y llama a la vista

$resultado = Base::obtenerCombo('estudios', 'id', 'denominacion');
$resultado2 = Base::obtenerCombo('postres', 'id', 'nombre');

require_once("../View/nuevo.php");
?>