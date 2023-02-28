<?php

include('bd.php');

include('funciones2.php');
cabecera('Instituto');

session_start();

$Alumno = ($_SESSION['usuario']);

$cadenaselect = "SELECT MODULOS.COD_MODULO, MODULOS.NOMBRE
                FROM MODULOS
                INNER JOIN CURSA ON MODULOS.COD_MODULO=CURSA.COD_MODULO
                INNER JOIN USUARIOS ON USUARIOS.DNI=CURSA.DNI_ALUMNO
                WHERE USUARIOS.NOMBRE='" . $_SESSION['usuario'] . "'";


echo $cadenaselect;



$modulos = ejecutarConsulta($cadenaselect);



echo "<h3>Selecciona un módulo</h3>";
echo "<form method='post' action=''>";

echo "<label>Módulos:</label><br>";
echo "<select name='modulos'>";


echo "<option value='0'>Todos</option>";

while ($fila = mysqli_fetch_array($modulos)) {
	echo "<option value='" . $fila['COD_MODULO'] . "'>" . $fila['NOMBRE'] . "</option>";
}

echo "</select><br>";

echo "<label>Evaluación:</label><br>";
echo "<select name='evaluacion'>";
echo "<option value='todas'>Todas</option>";
echo "<option value='1'>1ª</option>";
echo "<option value='2'>2ª</option>";
echo "<option value='3'>3ª</option>";
echo "</select><br>";
echo "<input type='submit' name='enviar' value='Aceptar'/>";
echo "</form>";

if (isset($_POST['enviar'])) {

	$OpcionModulo = $_POST['modulos'];
	$OpcionEvaluacion = $_POST['evaluacion'];

	$select = "SELECT MODULOS.NOMBRE, calificacion.EVALUACION, calificacion.NOTA ";
	$from = "FROM calificacion ";
	$innerJoin = "INNER JOIN usuarios ON usuarios.DNI=calificacion.DNI_ALUMNO
				  INNER JOIN MODULOS ON MODULOS.COD_MODULO=calificacion.COD_MODULO ";
	$where = "WHERE usuarios.NOMBRE='" . $Alumno . "'AND TRUE";

	if ($OpcionModulo == 0 && $OpcionEvaluacion == 'todas') {


		$sql = $select . $from . $innerJoin . $where;

		echo "<br>";
		echo $sql;

	}

	if ($OpcionModulo != 0 && $OpcionEvaluacion != 'todas') {

		$where = "AND MODULOS.COD_MODULO='" . $OpcionModulo . "' AND calificacion.EVALUACION='" . $OpcionEvaluacion . "'";

		$sql = $select . $from . $innerJoin . $where;

		echo "<br>";
		echo $sql;

	}

	if ($OpcionModulo != 0 && $OpcionEvaluacion == 'todas') {

		$where = "AND MODULOS.COD_MODULO='" . $OpcionModulo . "'";

		$sql = $select . $from . $innerJoin . $where;

		echo "<br>";
		echo $sql;

	}

	if ($OpcionModulo == 0 && $OpcionEvaluacion != 'todas') {

		$where = "AND calificacion.EVALUACION='" . $OpcionEvaluacion . "'";

		$sql = $select . $from . $innerJoin . $where;

		echo "<br>";
		echo $sql;

	}

	$notas = ejecutarConsulta($sql);

	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Modulo</th>";
	echo "<th>Evaluación</th>";
	echo "<th>Nota</th>";
	echo "</tr>";

	while ($fila = mysqli_fetch_array($notas)) {
		echo "<tr>";
		echo "<td>" . $fila['NOMBRE'] . "</td>";
		echo "<td>" . $fila['EVALUACION'] . "</td>";
		echo "<td>" . $fila['NOTA'] . "</td>";
		echo "</tr>";
	}


}


?>