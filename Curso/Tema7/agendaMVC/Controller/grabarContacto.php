<?php

require_once("../Model/contactos.php");
require_once("../Model/base.php");



//nuevo objeto de la clase contacto 

$Contacto = new Contacto($_POST["dni"], $_POST["nombre"], $_POST["apellido1"], $_POST["apellido2"], $_POST["domicilio"], $_POST["telefono"]);

// $ObjetoBase = new Base();

// $numero = $ObjetoBase->insertarContacto($Contacto);


$numero = Base::insertarContacto($Contacto);


if ($numero == 1)
    $correcto = true;
else
    $correcto = false;
include("../View/resultadoGrabacion.php");
?>