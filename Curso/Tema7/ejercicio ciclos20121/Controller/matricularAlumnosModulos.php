<?php
require_once("../Model/base.php");

//obtenemos los modulos del profesor
$alumnos = Base::obtenerComboAlumnos();
$modulo = Base::obtenerComboModulos();


$al = $_POST['alumno'];
$mod = $_POST['modulo'];

$SiExiste = Base::existe($al, $mod);

// if ($SiExiste) {

//     //si existe el alumno en el modulo actualizamos veces que ha cursado
//     $Update = Base::actualiza($al, $mod);

// } else {

//     //si no existe el alumno en el modulo lo insertamos
//     $Insertar = Base::inserta($al, $mod);
// }

echo "<pre>";
print_r($SiExiste);
echo "</pre>";

include("../View/matricularAlumnosModulos.php");



?>