<?php
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
require_once 'bd.php';
include 'conexion.php';
comprobar_sesion();
?>
<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto Carrito</title>
	<style type="text/css">
		@import url("css/mycss.css");
	</style>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php require 'cabecera.php'; ?>
	<div class="todo">

		<div id="cabecera">
			<img src="img/swirl.png" width="1188" id="img1">
		</div>

		<h1 class="text-center"> Categorias</h1>

		<br>
		<br>
		<div id="contenido">

			<?php

			echo "<table style='margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;'>";
			echo "<tr><th>Nombre</th>";
			echo "<th> <a href='nuevo_cat1.php'> <button type='button' class='btn btn-info'>Nuevo</button> </a> </th>";
			echo "<th>";
			$arrayClientes = obtenerArrayOpciones("clientes", "NUM_CLIENTE", "NOMBRE");
			pintarComboMensaje($arrayClientes, "Cliente", "Todos los clientes", 0);
			echo "<th>	</tr>";

			$categorias = cargar_categorias();
			if ($categorias === false) {
				echo "<p class='error'>Error al conectar con la base datos</p>";
			} else {
				echo "<ul>"; //abrir la lista
				while ($cat = mysqli_fetch_assoc($categorias)) {
					/*$cat['nombre] $cat['codCat']*/
					$url = "productos.php?categoria=" . $cat['codCat'];
					echo "<tr><td><a href='$url'>" . $cat['Nombre'] . "</a> <br></td></tr>";
				}
				echo "</ul>";
			}




			echo "</table>";

			?>




		</div>
	</div>
</body>

</html>