<?php

function comprobar_usuario($nombre, $clave)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$ins = "select * from clientes where NOMBRE = '$nombre' 
			and PASSWORD = '$clave'";
	$bd->set_charset('utf8');
	$resul = mysqli_query($bd, $ins);
	if ($fila = mysqli_fetch_assoc($resul)) {
		return $fila;
	} else {
		return FALSE;
	}
}
function cargar_categorias()
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$bd->set_charset('utf8');
	$ins = "select codCat, Nombre from categoria";
	$resul = mysqli_query($bd, $ins);
	if (!$resul) {
		return FALSE;
	}
	if (mysqli_num_rows($resul) == 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul;
}

function cargar_pedidos($nombre)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$bd->set_charset('utf8');


	$sql = "SELECT  productos.Nombre, pedidos.FECHA FROM  productos , lineas, pedidos, clientes WHERE productos.CodProd = lineas.COD_PRODUCTO AND pedidos.NUM_PEDIDO = lineas.NUM_PEDIDO AND clientes.NUM_CLIENTE = $nombre;";
	echo $sql;
	$resul = mysqli_query($bd, $sql);
	if (!$resul) {
		return FALSE;
	}
	if (mysqli_num_rows($resul) == 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul;
}

function cargar_categoria($codCat)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$ins = "select nombre, descripcion from categoria where codcat = $codCat";
	$bd->set_charset('utf8');
	$resul = mysqli_query($bd, $ins);
	if (!$resul) {
		return FALSE;
	}
	if (mysqli_num_rows($resul) == 0) {
		return FALSE;
	}
	//si hay 1 
	return mysqli_fetch_assoc($resul);

}
function cargar_productos_categoria($codCat)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$bd->set_charset('utf8');
	$sql = "select * from productos where codCat  = $codCat";
	$resul = mysqli_query($bd, $sql);
	if (!$resul) {
		return FALSE;
	}
	if (mysqli_num_rows($resul) == 0) {
		return FALSE;
	}
	//si hay 1 o más
	return $resul;
}
// recibe un array de códigos de productos
// devuelve un cursor con los datos de esos productos
function cargar_productos($codigosProductos)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$texto_in = implode(",", $codigosProductos);
	$ins = "select * from productos where codProd in($texto_in)";
	$bd->set_charset('utf8');
	$resul = mysqli_query($bd, $ins);
	if (!$resul) {
		return FALSE;
	}
	return $resul;
}
//funcion de insertar pedido
function insertar_pedido($carrito, $codRes)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	foreach ($carrito as $codProd => $unidades) {
		$stock = "SELECT Stock FROM productos WHERE CodProd = '" . $codProd . "'";
		$resul = mysqli_query($bd, $stock);

		while ($unicaFila = $resul->fetch_assoc()) {
			extract($unicaFila);
			if ($Stock < $unidades['1']) {
				return "No se ha podido hacer el pedido ya que hay un producto que no tiene stock";
			}


		}

	}

	$hora = date("Y-m-d H:i:s", time());
	// insertar el pedido
	$sql = "insert into pedidos(CLIENTE, FECHA) 
            values($codRes,'$hora')";
	$resul = mysqli_query($bd, $sql);
	if (!$resul) {
		return FALSE;
	}

	$sql = "SELECT MAX(NUM_PEDIDO) AS NUM_PEDIDO FROM pedidos";
	$resul = mysqli_query($bd, $sql);

	while ($unicaFila = $resul->fetch_assoc()) {
		extract($unicaFila);
		$ultimoLugar = $NUM_PEDIDO;
	}
	// coger el id del nuevo pedido para las filas detalle
	$pedido = mysqli_insert_id($bd);
	// insertar las filas en pedidoproductos
	foreach ($carrito as $codProd => $unidades) {
		$sql = "insert into lineas (NUM_PEDIDO, COD_PRODUCTO, PRECIO, CANTIDAD) 
            values(" . $ultimoLugar . "," . $codProd . "," . $unidades['2'] . "," . $unidades['1'] . ")";
		$resul = mysqli_query($bd, $sql);

		$stock = "SELECT Stock FROM productos WHERE CodProd = '" . $codProd . "'";
		$resul = mysqli_query($bd, $stock);

		while ($unicaFila = $resul->fetch_assoc()) {
			extract($unicaFila);
			$stock = intval($Stock);
			$total = $stock - $unidades['1'];
		}
		$sql = "UPDATE productos SET Stock='" . $total . "' WHERE CodProd = '" . $codProd . "'";
		$resul = mysqli_query($bd, $sql);


	}


	return $pedido;


}



function cargar_foto($codProducto)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$sql = "SELECT * FROM fotos WHERE num_ident=$codProducto";
	$resultado = $bd->query($sql);
	$fichero = "images/";
	if ($unicaFila = $resultado->fetch_assoc())
		$fichero .= $unicaFila["imagen"];
	else
		$fichero .= "sinfoto.gif";
	return $fichero;
}

function pintarComboMensaje($arrayOpciones, $nombreCombo, $textoPrimeraOpcion, $valorPrimeraOpcion)
{
	echo "<select name='" . $nombreCombo . "'>";
	echo "<option value='$valorPrimeraOpcion'>$textoPrimeraOpcion</option>";
	foreach ($arrayOpciones as $indice => $valor) {
		echo "<option value='" . $indice . "'>" . $valor . "</option>";
	}
	echo "</select>";
}

function obtenerArrayOpciones($tabla, $guarda, $muestra)
{
	global $conexion;
	$arrayCombo = array();
	$sql = "SELECT $guarda,$muestra FROM $tabla order by $muestra";
	$resultado = mysqli_query($conexion, $sql);
	while ($row = mysqli_fetch_assoc($resultado)) {
		$indice = $row[$guarda];
		$arrayCombo[$indice] = $row[$muestra];
	}
	return $arrayCombo;
}

function mostrarSelect($resultSet)
{
	$nfilas = mysqli_num_rows($resultSet);
	if ($nfilas == 0)
		$devuelve = "la consulta no ha devuelto ninguna fila";
	else {
		$devuelve = "<table border='1'>";
		$fila = (mysqli_fetch_assoc($resultSet));
		$devuelve .= "<tr>";
		foreach ($fila as $nombreColumna => $contenido) {
			$devuelve .= "<th>" . $nombreColumna . "</th>";
		}
		$devuelve .= "</tr>";


		while ($fila) {
			$devuelve .= "<tr>";
			foreach ($fila as $contenido) {
				$devuelve .= "<td>" . $contenido . "</td>";
			}
			$devuelve .= "</tr>";
			$fila = (mysqli_fetch_assoc($resultSet));
		}
		$devuelve .= "</table>";
	}
	return $devuelve;
}

function NuevoCatalogo($nom, $Descp)
{
	include 'conexion.php';
	$sentencia = "INSERT INTO categoria (CodCat, Nombre, Descripcion) VALUES (' ', '" . $nom . "', '" . $Descp . "') ";
	$conexion->query($sentencia) or die("Error al ingresar los datos" . mysqli_error($conexion));
}

function NuevoProducto($nom, $Descp, $Stock, $precio, $CodCat)
{
	include 'conexion.php';
	$sentencia = "INSERT INTO `productos`(`CodProd`, `Nombre`, `Descripcion`, `Stock`, `precio`, `CodCat`) VALUES (' ','$nom','$Descp',$Stock,$precio,$CodCat);";
	$conexion->query($sentencia) or die("Error al ingresar los datos" . mysqli_error($conexion));
}
?>