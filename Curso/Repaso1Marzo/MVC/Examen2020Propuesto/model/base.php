<?php
require_once("familia.php");
require_once("producto.php");
class ClaseExamen
{
	protected static function connectDB()
	{
		try {
			$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$dsn = "mysql:host=localhost;dbname=examen";
			$usuario = "root";
			$contrasena = "";
			$base = new PDO($dsn, $usuario, $contrasena, $opc);
		} catch (PDOException $e) {
			die("Error" . $e->getMessage());
			$resultado = null;
		}
		return $base;
	}

	protected static function ejecutaConsulta($sql)
	{
		//recibe una cadena conteniendo una instruccion SELECT y devuelve un resultset
		try {
			$miconexion = self::connectDB();
			$resultado = $miconexion->query($sql);
		} catch (PDOException $e) {
			die("Error" . $e->getMessage());

		}
		return $resultado;
	}
	protected static function ejecutaConsultaAccion($sql)
	{
		/*recibe una cadena conteniendo una instruccion DML, la ejecuta y
		devuelve el nº de filas afectadas por dicha instruccion*/
		try {
			$miconexion = self::connectDB();
			$resultado = $miconexion->exec($sql);
		} catch (PDOException $e) {
			die("Error" . $e->getMessage());

		}
		return $resultado;
	}
	public static function obtieneFamilias()
	{
		/*devuelve un array de objetos  familia*/
	}
	public static function obtieneProductos($listafamilias)
	{
		/* recibe varias familias y devuelve un array de objetos  producto
		de las familias recibidas*/
	}
	public static function obtieneProducto($codigo)
	{
		/*recibe un código de producto y devuelve el producto de ese código*/
	}
	public static function borrarProducto($codigo)
	{
		/*recibe un código de producto y usando el método ejecutaConsultaAccion($sql) borra el producto de ese código*/
	}


	public static function ActualizarProducto($codigo, $nombre, $precio)
	{
		/*recibe un código de producto, un nombre y un precio y usando el método ejecutaConsultaAccion($sql) 
		le asigna al producto de ese código, el precio y el nombre recibidos*/
	}
}

?>