<?php
require_once("../Model/base.php");

//Controlar 
//"Debe seleccionar algún estudio"

$seleccion = $_POST["estudia"];
if ($seleccion == "Seleccione") {
    $errores[] = "Debe seleccionar algún estudio";
}


//"Debe especificar el estudio (no vale "Seleccione"
if ($seleccion == "Seleccione") {
    $errores[] = "Debe especificar el estudio (no vale 'Seleccione')";
}

//"Debe seleccionar algún postres";

$seleccion = $_POST["platos"];
if ($seleccion == "Seleccione") {
    $errores[] = "Debe seleccionar algún postres";
}


//"Selección errónea en los postres

if ($seleccion == "Seleccione") {
    $errores[] = "Selección errónea en los postres";
}


//"El nombre no puede estar vacío"y 

if (empty($_POST["nombre"])) {
    $errores[] = "El nombre no puede estar vacío";
}

//Si todo va bien crea un nuevo objeto de la clase persona e inserta los datos en la b.d.
//en la vista muestra los errores si ha ido mal o el mensaje encuesta grabada




extract($_POST);

echo "<pre> ";
echo print_r($_POST);
echo "</pre>";

$Persona = new Persona($_POST["nombre"], $_POST["estudia"], $_POST["platos"]);




$resultado = Base::introducirPersona($Persona);


require_once("../View/mensaje_insercion.php");
?>