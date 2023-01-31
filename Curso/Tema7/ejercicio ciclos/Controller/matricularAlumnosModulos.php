<?php
require_once("../Model/base.php");

//obtenemos los modulos del profesor
$alumnos = Base::obtenerComboAlumnos();
$modulo = Base::obtenerComboModulos();
$SiExiste = Base::existe($al, $mod);

$al = $_POST['al'];
$mod = $_POST['modulos'];



echo "<pre>";
print_r($_POST);
echo "</pre>";

include("../View/matricularAlumnosModulos.php");



?>