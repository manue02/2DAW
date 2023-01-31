<?php
require_once("../Model/base.php");
require_once("../Model/base.php");
$autores=Base::obtenerCombo("autores","id","nombre");
$idiomas=Base::obtenerCombo("idiomas","id","nombre");
$editoriales=Base::obtenerCombo("editorial","id","nombre");
require_once("../View/consultar.php");

?>




