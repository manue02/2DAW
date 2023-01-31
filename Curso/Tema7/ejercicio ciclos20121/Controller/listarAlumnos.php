<?php
require_once("../Model/base.php");


$modulo = $_POST['modulo'];
$profesor = $_POST['profesor'];
$duracion = Base::obtenerModulo($modulo);

$paco = $duracion->getDuracion();

$alumnos = Base::listarAlumnos($modulo);

echo "<p>Alumnos matriculados en $modulo, duracion: $paco </p> ";

echo "<p>Profesor: $profesor</p>";

foreach ($alumnos as $alumno) {
	echo "<p>$alumno</p>";
}



// echo "<pre>";
// print_r($paco);
// echo "</pre>";

include("../View/listarAlumnos.php");
?>