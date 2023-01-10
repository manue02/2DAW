<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Lista de categorías</title>
</head>

<body>
	<?php require 'cabecera.php'; ?>
	<h1>Lista de categorías</h1>
	<!--lista de vínculos con la forma 
		productos.php?categoria=1-->
	<?php
	$categorias = cargar_categorias();
	if ($categorias === false) {
		echo "<p class='error'>Error al conectar con la base datos</p>";
	} else {
		echo "<ul>"; //abrir la lista
		while ($cat = mysqli_fetch_assoc($categorias)) {
			/*$cat['nombre] $cat['codCat']*/
			$url = "productos.php?categoria=" . $cat['codCat'];
			echo "<li><a href='$url'>" . $cat['Nombre'] . "</a></li><br>";
		}
		echo "</ul>";
	}
	?>
</body>

</html>