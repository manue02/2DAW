<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla de Productos</title>
	<style type="text/css">
		@import url("css/mycss.css");
	</style>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>


	<div class="todo">

		<?php require 'cabecera.php'; ?>

		<div id="cabecera">
			<img src="img/swirl.png" width="1188" id="img1">
		</div>

		<div id="contenido">

			<?php

			$cat = cargar_categoria($_GET['categoria']);
			$productos = cargar_productos_categoria($_GET['categoria']);
			if ($cat === FALSE or $productos === FALSE) {
				echo "<p class='error'>Error al conectar con la base datos</p>";
				exit;
			}



			echo "<h1 class='text-center'>" . $cat['nombre'] . "</h1> <br>";
			echo "<table style='margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;'>";
			echo "<tr><th>Artículo</th><th>Nombre</th><th>Descripción</th><th>Comprar</th>";
			echo "<th> <a href='nuevo_prod1.php'> <button type='button' class='btn btn-info'>Nuevo</button> </a> </th> </tr>";

			while ($producto = mysqli_fetch_assoc($productos)) {

				$cod = $producto['CodProd'];
				$nombreFoto = cargar_foto($cod);
				$nom = $producto['Nombre'];
				$des = $producto['Descripcion'];
				echo "<tr><td>";
				echo "<img src='" . $nombreFoto . "' width='52' height='52'>";
				echo "</td><td>$nom</td><td>$des</td>
			<td><form action = 'anadir.php' method = 'POST'>
			<input name = 'unidades' type='number' min = '1' value = '1'>
			<input type = 'submit' value='Comprar'><input name = 'cod' type='hidden' value = '$cod'>
			
			</form></td></tr>";
			}
			echo "</table>"
				?>

			<div>
				<div>




</body>

</html>




</div>