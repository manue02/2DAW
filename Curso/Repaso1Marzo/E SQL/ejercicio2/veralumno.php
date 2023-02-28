<?php

include('bd.php');

include('funciones1.php');
cabecera('Instituto');

session_start();

$Alumno = ($_SESSION['usuario']);

$cadenaselect = "SELECT MODULOS.COD_MODULO, MODULOS.NOMBRE
					FROM MODULOS
					INNER JOIN imparte ON MODULOS.COD_MODULO=imparte.COD_MODULO
					INNER JOIN USUARIOS ON USUARIOS.DNI=imparte.DNI_PROFESOR
					WHERE USUARIOS.NOMBRE='" . $_SESSION['usuario'] . "'";


echo $cadenaselect;

$modulos = ejecutarConsulta($cadenaselect);


echo "<h3>Selecciona un módulo</h3>";
echo "<form method='post' action=''>";

echo "<label>Módulos:</label><br>";
echo "<select name='modulos'>";
while ($fila = mysqli_fetch_array($modulos)) {
	echo "<option value='" . $fila['COD_MODULO'] . "'>" . $fila['NOMBRE'] . "</option>";
}

echo "</select><br>";

echo "<input type='submit' name='enviar' value='Aceptar'/>";
echo "</form>";

if (isset($_POST['enviar'])) {

	$OpcionModulo = $_POST['modulos'];

	$select = "SELECT DISTINCT usuarios.NOMBRE ";
	$from = "FROM calificacion ";
	$innerJoin = "INNER JOIN usuarios ON usuarios.DNI=calificacion.DNI_ALUMNO
				  INNER JOIN MODULOS ON MODULOS.COD_MODULO=calificacion.COD_MODULO ";
	$where = "WHERE calificacion.COD_MODULO='" . $OpcionModulo . "'";



	$cadena = $select . $from . $innerJoin . $where;

	echo $cadena;

	$notas = ejecutarConsulta($cadena);

	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Nombre</th>";
	echo "</tr>";

	while ($fila = mysqli_fetch_array($notas)) {
		echo "<tr>";
		echo "<td>" . $fila['NOMBRE'] . "</td>";
		echo "</tr>";
	}

	echo "</table>";
}

?>