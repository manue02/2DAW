<?php
$db = mysqli_connect('localhost', 'root', '') or
	die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'pedidosejemplo') or die(mysqli_error($db));
$dir = "img/";

$sql = "SELECT * FROM clientes";
$resultado = $db->query($sql);

if ($resultado->num_rows > 0) {
	// output data of each row
	while ($row = $resultado->fetch_assoc()) {
		echo "id: " . $row["id"] . " - Name: " . $row["nombre"] . " " . $row["apellidos"] . "<br>";
	}
} else {
	echo "0 results";
}

?>