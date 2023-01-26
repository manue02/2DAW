<?php
include "conexion.php";
require_once 'bd.php';
/*comprueba que el usuario haya abierto sesión o redirige*/
require 'sesiones.php';
comprobar_sesion();

echo print_r($_POST);

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
</head>

<body>

	<div class="todo">
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
					<?php

					echo "	<input name='cod' type='hidden' value='" . $_POST['cod'] . "'>";


					?>
					<button type='submit' class='btn btn-info'>Nuevo</button>
					<a href="http://localhost:8080/Clase/Curso/Proyecto/categorias.php"> <button type="button"
							class="btn btn-info">Atras</button></a>
				</form>


			</div>

		</div>


	</div>



</body>

</html>