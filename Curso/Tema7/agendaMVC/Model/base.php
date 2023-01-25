<?php
require_once("contactos.php");
class Base
{
	protected static function miConexion()
	{
		$cadena_conexion = 'mysql:dbname=agenda;host=localhost';
		$usuario = 'root';
		$clave = '';
		$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$conn = new PDO($cadena_conexion, $usuario, $clave, $opciones);
		return $conn;
	}
	public static function mostrarContactos($sql)
	{
		//recibe la instruccion SELECT y devuelve un array de objetos contacto
	}
	protected static function ejecutaConsultaAccion($instruccion)
	{

		try {
			$numero = self::miConexion()->exec($instruccion);
		} catch (PDOException $e) {
			$numero = 0;
		}
		return $numero;
	}
	public static function insertarContacto($pContacto)
	{
		//recibe un objeto contacto y lo inserta en la b.d. si el dni no existía ya en la tabla

		$instruccion = "INSERT INTO contactos (dni, nombre, apellido1, apellido2, domicilio, tfno) 
		VALUES ('" . $pContacto->getDni() . "','" . $pContacto->getNombre() . "','" . $pContacto->getApellido1() . "','" . $pContacto->getApellido2() . "','" . $pContacto->getDireccion() . "','" . $pContacto->getTelefono() . "')";

		echo $instruccion;
		$numero = self::ejecutaConsultaAccion($instruccion);

		return $numero;

	}


}
?>