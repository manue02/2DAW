<?php

//conexion a la base de datos
include("../Model/base.php");


//recuperamos el nombre del profesor

$nombreProfesor = $_POST['nombreProfesor'];


echo "<form action='listarAlumnos.php' method='post'>";


echo "<select name='modulo'>";


//obtenemos los modulos del profesor
$modulos = Base::visualizarModulos($nombreProfesor);

//creamos un combo con los modulos
foreach ($modulos as $modulo) {
      echo "<option value='$modulo'>$modulo</option>";
}



echo "</select>
<input type='hidden' name='profesor' value='" . $_POST["nombreProfesor"] . "'>
      <input type='submit' value='Ver Alumnos'>
     
      </form>";

// echo "<pre>";
// print_r($modulos);
// echo "</pre>";

include("../View/pedirProfesor.php");

echo "";

?>