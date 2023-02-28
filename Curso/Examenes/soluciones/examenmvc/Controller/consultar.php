
<?php
require_once("../Model/base.php");
$arrayTrabajos=Base::obtenerCombo("estudios","id","denominacion");
$arrayColores=Base::obtenerCombo("postres","id","nombre");
require_once("../View/consultar.php");
?>




