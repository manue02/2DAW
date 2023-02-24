
<!DOCTYPE html>
<html>
<head>
	<title>Modificar Producto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">

		<h3 class="text-center">Crear el Producto</h3>

		<form action="{{route('productos.store')}}" method="POST" class="form-horizontal">

			@csrf
			@method('POST')

			<div class="form-group">
				<label class="control-label col-sm-2">Código:</label>
				<div class="col-sm-10">
					<input type="text" name="codigo" value="" class="form-control" >
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Descripción:</label>
				<div class="col-sm-10">
					<input type="text" name="descripcion" value="" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Precio Compra:</label>
				<div class="col-sm-10">
					<input type="text" name="precio_compra" value="" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Precio Venta:</label>
				<div class="col-sm-10">
					<input type="text" name="precio_venta" value="" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2">Stock:</label>
				<div class="col-sm-10">
					<input type="text" name="stock" value="" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="enviar" value="Envio" class="btn btn-primary">Enviar</button>
					<a href="{{route('productos.index')}}" class="btn btn-default">Volver al listado</a>
				</div>
			</div>

		</form>

	</div>

</body>
</html>
