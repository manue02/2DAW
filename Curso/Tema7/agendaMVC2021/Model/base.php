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
		$contactos = array();
		//ejecutar la consulta que se le pasa como parámetro
		$resultado = self::miConexion()->query($sql);
		if ($resultado) {

			while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {


				$contactos[] = new Contacto($fila["dni"], $fila["nombre"], $fila["apellido1"], $fila["apellido2"], $fila["domicilio"], $fila["tfno"]);

			}


		}

		return $contactos;
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
		//recibe un objeto contacto y lo inserta en la b.d. si el dni no existía ya en la tabla y mostrara una tabla con el resultado de la operación si ya existía el dni se mostrará un mensaje de error  y se devolverá un 0

		$instruccion = "INSERT INTO contactos (dni, nombre, apellido1, apellido2, domicilio, tfno) 
		VALUES ('" . $pContacto->getDni() . "','" . $pContacto->getNombre() . "','" . $pContacto->getApellido1() . "','" . $pContacto->getApellido2() . "','" . $pContacto->getDireccion() . "','" . $pContacto->getTelefono() . "')";

		echo $instruccion;
		$numero = self::ejecutaConsultaAccion($instruccion);

		return $numero;

	}

}

?>