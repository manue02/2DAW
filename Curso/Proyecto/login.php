<?php
require_once 'bd.php';
/*formulario de login habitual
si va bien abre sesión, guarda el nombre de usuario y redirige a categorias.php 
si va mal, mensaje de error */
if (isset($_POST["usuario"])) {

	$usu = comprobar_usuario($_POST['usuario'], $_POST['clave']);
	if ($usu === false) {
		$err = true;
		$usuario = $_POST['usuario'];
	} else {
		session_start();
		// $usu tiene campos correo y codRes
		$_SESSION['usuario'] = $usu;
		$_SESSION['carrito'] = [];
		header("Location: categorias.php");
		return;
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
</head>

<body style="background-color: gray">

	<?php if (isset($_GET["redirigido"])) {
		echo "<p>Haga login para continuar</p>";
	} ?>
	<?php if (isset($err) and $err == true) {
		echo "<p> Revise usuario y contraseña</p>";
	} ?>
	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">Login de usuario</div>
					<div class="panel panel-body">
						<div style="text-align: center;">
							<img src="img/photo4.jpg" height="250">
						</div>
						<p></p>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
							<label for="usuario">Usuario</label>
							<input class="form-control input-sm" value="<?php if (isset($usuario))
								echo $usuario; ?>" id="usuario" name="usuario" type="text">
							<label for="clave">Clave</label>
							<input class="form-control input-sm" id="clave" name="clave" type="password">
							<br>
							<input class="btn btn-primary" type="submit">
							<a href="registro.php" class="btn btn-danger">Registro</a>
						</form>

					</div>
				</div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>