<?php


include('bd.php');

include('funciones1.php');
cabecera('Instituto');

session_start();

$Alumno = ($_SESSION['usuario']);

$Profesor = ObtenerDNI($Alumno);

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

$modulosProfe = $_POST['modulos'];

echo $modulosProfe;

$select = "SELECT DISTINCT usuarios.NOMBRE ";
$from = "FROM calificacion ";
$innerJoin = "INNER JOIN usuarios ON usuarios.DNI=calificacion.DNI_ALUMNO 
	INNER JOIN imparte ON imparte.COD_MODULO = calificacion.COD_MODULO INNER JOIN usuarios p ON p.DNI = imparte.DNI_PROFESOR  INNER JOIN cursa ON cursa.DNI_ALUMNO = calificacion.DNI_ALUMNO";
$where = " WHERE imparte.DNI_PROFESOR ='" . $Profesor . "' AND calificacion.COD_MODULO = '" . $modulosProfe . "'";

$cadena = $select . $from . $innerJoin . $where;

echo "<br>";
echo $cadena;

$notas = ejecutarConsulta($cadena);

echo "<h3>Selecciona un alumno y su nota</h3>";

echo "<form method='post' action=''>";
echo "<label>Alumnos:</label><br>";
echo "<select name='alumnos'>";

while ($fila2 = mysqli_fetch_array($notas)) {
	echo "<option value='" . $fila2['NOMBRE'] . "'>" . $fila2['NOMBRE'] . "</option>";
}

echo "</select><br>";

echo "<label>Evaluación:</label><br>";
echo "<select name='evaluacion'>";
echo "<option value='1'>1</option>";
echo "<option value='2'>2</option>";
echo "<option value='3'>3</option>";
echo "</select><br>";

echo "<label>Nota:</label><br>";
echo "<select name='nota'>";
echo "<option value='0'>0</option>";
echo "<option value='1'>1</option>";
echo "<option value='2'>2</option>";
echo "<option value='3'>3</option>";
echo "<option value='4'>4</option>";
echo "<option value='5'>5</option>";
echo "<option value='6'>6</option>";
echo "<option value='7'>7</option>";
echo "<option value='8'>8</option>";
echo "<option value='9'>9</option>";
echo "<option value='10'>10</option>";
echo "</select><br>";
echo "<input type='hidden' value='$modulosProfe' name='modulo'/>";
echo "<input type='submit' name='envio' value='Enviar'/>";
echo "</form>";

if (isset($_POST['envio'])) {
	$alumno = $_POST['alumnos'];
	$evaluacion = $_POST['evaluacion'];
	$nota = $_POST['nota'];
	$modulosProfe = $_POST['modulo'];


	$alumno = ObtenerDNI($alumno);

	$consulta = "UPDATE calificacion SET NOTA = '" . $nota . "' WHERE DNI_ALUMNO = '" . $alumno . "' AND COD_MODULO = '" . $modulosProfe . "' AND calificacion.EVALUACION = '" . $evaluacion . "';";

	echo "<br>";
	echo $consulta;

	$actualizar = ejecutarConsulta($consulta);
}



?>