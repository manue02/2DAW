<?php
require_once("modulos.php");
require_once("alumnos.php");
class Base
{
	protected static function conexion()
	{
		// devuelve un connection
		$con = new mysqli('localhost', 'root', '', "ciclo");
		$con->set_charset("utf8");
		return $con;
	}
	public static function ejecutaConsulta($sql)
	{
		$conn = self::conexion();
		$resultado = null;
		if (isset($conn))
			$resultado = $conn->query($sql);
		return $resultado;
	}
	public static function visualizarModulos($nombreProfesor)
	{
		//devuelve array de modulos del profesor recibido como parametro
		$modulos = array();
		$sql = "SELECT DISTINCT modulos.NOMBRE  FROM modulos , imparte , profesores WHERE profesores.NOMBRE = '$nombreProfesor' AND profesores.ID = imparte.ID_PROFESOR AND modulos.ID_MODULO = imparte.ID_MODULO";
		$resultado = self::ejecutaConsulta($sql);

		while ($fila = mysqli_fetch_array($resultado)) {
			$modulos[] = $fila['NOMBRE'];

		}
		return $modulos;

	}
	public static function listarAlumnos($modulo)
	{
		//devuelve array de alumnos matriculados en el modulo recibido como parametro
		$alumnos = array();
		$sql = "SELECT alumnos.NOMBRE, modulos.DURACION FROM alumnos , cursa , modulos WHERE modulos.NOMBRE = '$modulo' AND modulos.ID_MODULO = cursa.ID_MODULO AND alumnos.ID = cursa.ID_ALUMNO";
		echo $sql;
		$resultado = self::ejecutaConsulta($sql);

		while ($fila = mysqli_fetch_array($resultado)) {
			$alumnos[] = $fila['NOMBRE'];
		}
		return $alumnos;


	}
	public static function obtenerModulo($idModulo)
	{
		//devuelve un objeto modulo con id= al recibido
		$modulos = array();
		$sql = "SELECT ID_MODULO , NOMBRE , DURACION FROM modulos WHERE NOMBRE = '$idModulo'";

		$resultado = self::ejecutaConsulta($sql);


		//ejecutar la consulta que se le pasa como parámetro
		if ($resultado) {

			while ($fila = $resultado->fetch_assoc()) {

				$modulos[] = $fila;

			}

			foreach ($modulos as $modulo => $valor) {

				foreach ($valor as $key) {

					$modulos2[] = $key;
				}

			}

			$arrayConversion = array();
			$arrayConversion["id"] = $modulos2[0];
			$arrayConversion["nombre"] = $modulos2[1];
			$arrayConversion["duracion"] = $modulos2[2];

		}

		$modulo = new Modulo($arrayConversion);

		return $modulo;

	}
	public static function obtenerComboAlumnos()
	{
		//devuelve array de alumnos

		$alumnos = array();
		$sql = "SELECT ID , NOMBRE FROM alumnos";

		$resultado = self::ejecutaConsulta($sql);

		while ($fila = mysqli_fetch_array($resultado)) {
			$alumnos[] = $fila['NOMBRE'];
		}

		return $alumnos;


	}
	public static function obtenerComboModulos()
	{

		//devuelve array asociativo en el que el indice es el id del modulo y el valor el nombre
		$modulos = array();
		$sql = "SELECT ID_MODULO , NOMBRE FROM modulos";

		$resultado = self::ejecutaConsulta($sql);

		while ($fila = mysqli_fetch_array($resultado)) {
			$modulos[] = $fila['NOMBRE'];
		}

		return $modulos;


	}

	public static function existe($alumno, $modulo)
	{
		//devuelve true si el alumno está matriculado en el módulo

		$sql = "SELECT * FROM cursa WHERE ID_ALUMNO = '$alumno' AND ID_MODULO = '$modulo'";
		$resultado = self::ejecutaConsulta($sql);

		if ($resultado->num_rows > 0) {
			return true;
		} else {
			return false;
		}

	}

	public static function actualiza($alumno, $modulo)
	{
		//hace un update en cursa añadiendo 1 a veces_matriculado en la fila correspondiente al idalumno y idmodulo recibidos

		$sql = "UPDATE cursa SET veces_matriculado = veces_matriculado + 1 WHERE ID_ALUMNO = '$alumno' AND ID_MODULO = '$modulo'";
		$resultado = self::ejecutaConsulta($sql);

		return $resultado;
	}
	public static function inserta($alumno, $modulo)
	{
		//hace un insert en cursa con el idalumno y idmodulo recibidos

		$sql = "INSERT INTO cursa (ID_ALUMNO, ID_MODULO, veces_matriculado) VALUES ('$alumno', '$modulo', 1)";
		$resultado = self::ejecutaConsulta($sql);

		return $resultado;

	}
}
?>