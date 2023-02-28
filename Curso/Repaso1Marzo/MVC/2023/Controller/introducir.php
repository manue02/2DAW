<?php
require_once("../Model/base.php");
/*
Controlar 
"Debe seleccionar algún estudio"
"Debe especificar el estudio (no vale "Seleccione"
"Debe seleccionar algún postres";
"Selección errónea en los postres
"El nombre no puede estar vacío"
y 
Si todo va bien crea un nuevo objeto de la clase persona e inserta los datos en la b.d.
en la vista muestra los errores si ha ido mal o el mensaje encuesta grabada*/

echo "<pre>";
print_r($_POST);
echo "</pre>";


if (isset($_POST["Insertar"])) {
    $errores = array();
    $nombre = $_POST["nombre"];
    $estudia = $_POST["estudia"];
    $postres = $_POST["platos"];
    if ($estudia == -1) {
        $errores[] = "Debe seleccionar algún estudio";
    }
    if ($estudia == 0) {
        $errores[] = "Debe especificar el estudio (no vale 'Seleccione')";
    }
    if (count($postres) == 0) {
        $errores[] = "Debe seleccionar algún postres";
    }
    if (count($postres) > 3) {
        $errores[] = "Selección errónea en los postres";
    }
    if ($nombre == "") {
        $errores[] = "El nombre no puede estar vacío";
    }
    if (count($errores) == 0) {
        $persona = new Persona($nombre, $estudia, $postres);
        $fueBien = Base::introducirPersona($persona);
    }
}

require_once("../View/mensaje_insercion.php");
?>