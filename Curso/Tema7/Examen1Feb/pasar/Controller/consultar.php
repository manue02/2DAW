<?php
require_once("../Model/base.php");

$resultado = Base::obtenerCombo('estudios', 'id', 'denominacion');

require_once("../View/consultar.php");
?>