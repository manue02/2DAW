
<?php
require_once("familia.php");
require_once("producto.php");
class ClaseExamen {
protected static function connectDB() {
          try { $opc=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$dsn="mysql:host=localhost;dbname=examen";
			$usuario="root";
			$contrasena="";
			$base=new PDO($dsn,$usuario,$contrasena,$opc);
		}
		catch (PDOException $e)
		{
			die ("Error".$e->getMessage());
			$resultado=null;
		}
    return $base;
  }
  protected static function ejecutaConsulta($sql)
{
		try
		{
		$miconexion=self::connectDB();
		$resultado=$miconexion->query($sql);
		}
		catch (PDOException $e)
		{
			die ("Error".$e->getMessage());
			
		}
		return $resultado;
}
protected static function ejecutaConsultaAccion($sql)
{
		try
		{
		$miconexion=self::connectDB();
		$resultado=$miconexion->exec($sql);
		}
		catch (PDOException $e)
		{
			die ("Error".$e->getMessage());
			
		}
		return $resultado;
}
public static function obtieneFamilias()
{
	$sql="SELECT cod,nombre From  familia order by nombre";
	$resultado=self::ejecutaConsulta($sql);
	$familias=array();
	if ($resultado)
		{
		
		while ($row=$resultado->fetch(PDO::FETCH_ASSOC))
		{
			$familias[]=new Familia($row['cod'],$row['nombre']);
			
		}
		}
	return $familias;
}
public static function obtieneProductos($listafamilias)
{
$sql="SELECT producto.cod,producto.nombre,producto.precio,producto.familia
						FROM producto INNER JOIN familia ON producto.familia=familia.cod
						WHERE familia.cod IN ". $listafamilias. " ORDER BY producto.familia,producto.nombre";
						
$resultado=self::ejecutaConsulta($sql);
$productos=array();
if ($resultado)
		{
		while ($row=$resultado->fetch(PDO::FETCH_ASSOC))
		{
			$productos[]=new Producto($row['cod'],$row['nombre'], $row['precio'], $row['familia']);
			
		}
		}

return $productos;
}
public  static function obtieneProducto($codigo)
{
$sql="SELECT cod,nombre, precio, familia
						FROM producto
						WHERE producto.cod='$codigo'";
						
$resultado=self::ejecutaConsulta($sql);
$row=$resultado->fetch(PDO::FETCH_ASSOC);
return new Producto($row['cod'],$row['nombre'], $row['precio'], $row['familia']);
 }
 public  static function borrarProducto($codigo)
{
$sql="DELETE FROM producto
						WHERE producto.cod='$codigo'";
						
$resultado=self::ejecutaConsultaAccion($sql);

 }
 public  static function ActualizarProducto($codigo,$nombre,$precio)
{
$sql="UPDATE producto SET precio=$precio,nombre='$nombre' 
						WHERE producto.cod='$codigo'";
						
$resultado=self::ejecutaConsultaAccion($sql);

 }
 }
?>