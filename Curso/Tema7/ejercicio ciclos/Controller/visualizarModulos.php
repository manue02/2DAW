<?php

//conexion a la base de datos
include("../Model/base.php");


//recuperamos el nombre del profesor
$nombreProfesor = $_POST['nombreProfesor'];

echo "<pre>" . print_r($_POST) . "</pre>";

//consulta para obtener los modulos del profesor
$sql = "SELECT DISTINCT modulos.NOMBRE FROM modulos , imparte , profesores WHERE profesores.NOMBRE = '$nombreProfesor' AND profesores.ID = imparte.ID_PROFESOR AND modulos.ID_MODULO = imparte.ID_MODULO";

//ejecutamos la consulta
$resultado = mysqli_query($conexion, $sql);

//echo $sql;

echo "<form action='listarAlumnos.php' method='post'>";


echo "<select name='modulo'>";

//recorremos el resultado de la consulta
while ($fila = mysqli_fetch_array($resultado)) {
      echo "<option value='" . $fila['NOMBRE'] . "'>" . $fila['NOMBRE'] . "</option>";
}


echo "</select>
      <input type='submit' value='Ver Alumnos'>
      </form>";



include("../View/pedirProfesor.php");

?>