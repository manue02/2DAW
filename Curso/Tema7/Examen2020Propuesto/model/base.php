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

	//solo select
	// protected static function ejecutaQuery($sql) {

	//     try {
	//         $conexion = self::conexion();
	//         $resultSet = $conexion->query($sql);
	//     } catch (PDOException $e) {
	//         die("Error:".$e->getMessage());
	//     }
	//     return $resultSet;
	// }

	// //update,delete,insert
	// protected static function ejecutaExec($sql) {

	//     try {
	//         $conexion = self::conexion();
	//         $resultSet = $conexion->exec($sql);
	//     } catch (PDOException $e) {
	//         die("Error:".$e->getMessage());
	//     }
	//     return $resultSet;
	// }

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

		$familia = array();
		$sql = "SELECT * FROM familia";
		$resultado = self::ejecutaConsulta($sql);

		while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
			$familia[] = new Familia($row['cod'], $row['nombre']);

		}
		return $familia;
	}
	public static function obtieneProductos($listafamilias)
	{
		/* recibe varias familias y devuelve un array de objetos  producto
		de las familias recibidas*/

		$producto = array();
		$sql = "SELECT * FROM producto WHERE familia IN ($listafamilias)";
		$resultado = self::ejecutaConsulta($sql);

		while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
			$producto[] = new Producto($row['cod'], $row['nombre'], $row['precio'], $row['familia']);

		}
		return $producto;
	}

	// 	public static function obtieneProductos($listafamilias)
// {
// $sql="SELECT producto.cod,producto.nombre,producto.precio,producto.familia
// 						FROM producto INNER JOIN familia ON producto.familia=familia.cod
// 						WHERE familia.cod IN ". $listafamilias. " ORDER BY producto.familia,producto.nombre";

	// $resultado=self::ejecutaConsulta($sql);
// $productos=array();
// if ($resultado)
// 		{
// 		while ($row=$resultado->fetch(PDO::FETCH_ASSOC))
// 		{
// 			$productos[]=new Producto($row['cod'],$row['nombre'], $row['precio'], $row['familia']);

	// 		}
// 		}

	// return $productos;
// }
	public static function obtieneProducto($codigo)
	{
		/*recibe un código de producto y devuelve el producto de ese código*/
		$sql = "SELECT * FROM producto WHERE cod=$codigo";
		$resultado = self::ejecutaConsulta($sql);
		$fila = $resultado->fetchObject();
		$producto = new Producto($fila->cod, $fila->nombre, $fila->precio, $fila->familia);
		return $producto;
	}

	// public static function obtieneProducto($codigo)
	// {
	// 	$sql = "SELECT cod,nombre, precio, familia
	// 					FROM producto
	// 					WHERE producto.cod='$codigo'";

	// 	$resultado = self::ejecutaConsulta($sql);
	// 	$row = $resultado->fetch(PDO::FETCH_ASSOC);
	// 	return new Producto($row['cod'], $row['nombre'], $row['precio'], $row['familia']);
	// }
	public static function borrarProducto($codigo)
	{
		/*recibe un código de producto y usando el método ejecutaConsultaAccion($sql) borra el producto de ese código*/
		$sql = "SELECT * FROM producto WHERE cod=$codigo";
		$resultado = self::ejecutaConsulta($sql);

		if ($resultado->rowCount() > 0) {
			$sql = "DELETE FROM producto WHERE cod=$codigo";
			self::ejecutaConsultaAccion($sql);
		} else {
			echo "No existe el producto";
		}


	}


	public static function ActualizarProducto($codigo, $nombre, $precio)
	{
		/*recibe un código de producto, un nombre y un precio y usando el método ejecutaConsultaAccion($sql) 
		le asigna al producto de ese código, el precio y el nombre recibidos*/
		$sql = "SELECT * FROM producto WHERE cod=$codigo";
		$resultado = self::ejecutaConsulta($sql);

		if ($resultado->rowCount() > 0) {
			$sql = "UPDATE producto SET nombre='$nombre', precio=$precio WHERE cod=$codigo";
			self::ejecutaConsultaAccion($sql);
		} else {
			echo "No existe el producto";
		}
	}
}
?>