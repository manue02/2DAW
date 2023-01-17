<?php

function comprobar_usuario($nombre, $clave)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$ins = "select NUM_CLIENTE, EMAIL from clientes where NOMBRE = '$nombre' 
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
function insertar_pedido($carrito, $codRes, $Cliente)
{
	$bd = mysqli_connect("localhost", "root", "", "pedidosejemplo");
	$hora = date("Y-m-d H:i:s", time());
	// insertar el pedido
	$sql = "insert into pedidosejemplo(NUM_PEDIDO, CLIENTE, FECHA) 
			values('$codRes',$Cliente, $hora)";
	$resul = mysqli_query($bd, $sql);
	if (!$resul) {
		return FALSE;
	}

	// insertar los productos del pedido
	foreach ($carrito as $codProd => $cantidad) {
		$sql = "insert into lineaspedido(NUM_PEDIDO, COD_PROD, CANTIDAD) 
				values('$codRes', $codProd, $cantidad)";
		$resul = mysqli_query($bd, $sql);
		if (!$resul) {
			return FALSE;
		}
	}
	return TRUE;
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
?>