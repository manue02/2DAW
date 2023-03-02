<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

include("funcionesBD.php");

$departamentoNombre = $_POST['CodigosDepartamento'];

$NumeroDepartamento = $_POST['departamento'];



$sql2 = "SELECT descripcion FROM modulos WHERE departamento = '$departamentoNombre' AND curso = " . $_POST['departamento'];

$resultado = ejecutarConsulta($sql2);

$fila = $resultado->fetch_assoc();

$descripcion = $fila['descripcion'];

//ahora para el numero de creditos

$sql3 = "SELECT num_creditos  FROM modulos WHERE departamento = '$departamentoNombre' AND curso = " . $_POST['departamento'];

$resultado = ejecutarConsulta($sql3);

$fila = $resultado->fetch_assoc();

$creditos = $fila['num_creditos'];

$sql4 = "SELECT edificio, NUMAULA  FROM modulos_aulas WHERE departamento = '$departamentoNombre' AND curso = " . $_POST['departamento'];

echo $sql4;

$resultado = ejecutarConsulta($sql4);

$fila = $resultado->fetch_assoc();

echo "<pre>";
print_r($fila);
echo "</pre>";

$edificio = $fila['EDIFICIO'];

$aula = $fila['NUMAULA'];


echo $edificio;


echo "<table border='1'><tr><td>Modulo seleccionado:  </td><td><b>$departamentoNombre $NumeroDepartamento $descripcion</b></td></tr>";
echo " <tr><td>Num. Creditos:   </td><td><b>$creditos</b></td></tr>";
echo "<tr><td>Se imparte en:</td><td><b> ";
echo " $edificio  aula: $aula</b></td></tr></table>";
echo "<form action='seleccionaula.php' action='POST'>";



echo '<tr><td colspan="2"><input type="submit" name="envio" value="Cambiar aula" /></form></td></tr></table>';
?>