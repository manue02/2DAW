<?php
include_once ("../Model/base.php");
 if (isset($_POST['localidad'])) 
 {
        $arrayEmpleados = miclase::obtenerempleados($_POST['localidad'],$_POST['horario']);

 }

$numvisitas=miclase::InsertarVisita();;
require_once ("../View/ver_empleados.php");
?>