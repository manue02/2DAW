<?php
include "conexion.php";
require_once 'bd.php';
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
					<h1 class="text-center">Alta de Nuevo Producto</h1>
				</span>
				<br>
				<form action="nuevo_prod2.php" method="POST"
					style="border-collapse: separate; border-spacing: 10px 5px;">
					<div class="col-12 col-md-12 col-lg-12 my-2">
						<div class="row">
							<div class="col-md-6 col-lg-10">
								<label for="exampleFormControlInput1" class="col-form-label letra-blanca">Nombre</label>
							</div>
							<div class="col-md-5 col-lg-10">
								<input type="text" class="form-control" id="Nombre_id" name="Nombre_id" />
							</div>
						</div>
					</div>

					<div class="col-12 col-md-12 col-lg-12 my-2">
						<div class="row">
							<div class="col-md-6 col-lg-10">
								<label for="exampleFormControlInput1"
									class="col-form-label letra-blanca">Descripcion</label>
							</div>
							<div class="col-md-5 col-lg-10">
								<input type="text" class="form-control" id="Descripcion_id" name="Descripcion_id" />
							</div>
						</div>
					</div>

					<div class="col-12 col-md-12 col-lg-12 my-2">
						<div class="row">
							<div class="col-md-6 col-lg-10">
								<label for="exampleFormControlInput1" class="col-form-label letra-blanca">Stock</label>
							</div>
							<div class="col-md-5 col-lg-10">
								<input type="number" class="form-control" id="Stock_id" name="Stock_id" />
							</div>
						</div>
					</div>

					<div class="col-12 col-md-12 col-lg-12 my-2">
						<div class="row">
							<div class="col-md-6 col-lg-10">
								<label for="exampleFormControlInput1" class="col-form-label letra-blanca">Precio</label>
							</div>
							<div class="col-md-5 col-lg-10">
								<input type="number" class="form-control" id="Precio_id" name="Precio_id" />
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-success">Guardar</button>
					<a href="http://localhost:8080/Clase/Curso/Proyecto/categorias.php"> <button type="button"
							class="btn btn-info">Atras</button></a>
				</form>


			</div>

		</div>


	</div>


</body>

</html>