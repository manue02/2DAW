<?php
include "conexion.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta de Categoria</title>
	<style type="text/css">
		@import url("css/mycss.css");
	</style>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<div class="todo">

		<div id="cabecera">
			<img src="img/swirl.png" width="1188" id="img1">
		</div>

		<div id="contenido">
			<div style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
				<span>
					<h1 class="text-center">Alta de Nueva Categoria</h1>
				</span>
				<br>
				<form action="nuevo_cat2.php" method="POST"
					style="border-collapse: separate; border-spacing: 10px 5px;">
					<label>Categoria</label>
					<input type="text" id="categoria_id" name="categoria_id"><br>
					<br>
					<label>Descripcion</label>
					<input type="text" id="Descripcion_id" name="Descripcion_id"><br>
					<br>
					<button type="submit" class="btn btn-success">Guardar</button>
					<a href="http://localhost:8080/Clase/Curso/Proyecto/categorias.php"> <button type="button"
							class="btn btn-info">Atras</button></a>
				</form>


			</div>

		</div>


	</div>


</body>

</html>