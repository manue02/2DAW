<?php

include_once ("../Model/base.php");
    if (isset($_GET['depto'])) {
        $depto = miclase::obtenerdepto($_GET['depto']);

    }
		
require_once ("../View/ver_departamento.php");
?>