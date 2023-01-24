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
		header("Location: indexalumno.php");
		return;
	}
}
?>


<html>

<head></head>

<body>
	<?php if (isset($_GET["redirigido"])) {
		echo "<p>Haga login para continuar</p>";
	} ?>
	<?php if (isset($err) and $err == true) {
		echo "<p> Revise usuario y contraseña</p>";
	} ?>
	<h2>Bienvenido</h2>
	<form name="formulario" method="post">
		<fieldset>
			<legend>Identificarse</legend>
			<input class="form-control input-sm" value="<?php if (isset($usuario))
				echo $usuario; ?>" id="usuario" name="usuario" type="text">
			<label for="clave">Clave</label>
			<input class="form-control input-sm" id="clave" name="clave" type="password">
			<br>
		</fieldset>
		<input name="envio" value="enviar" type="submit">
		<input value="borrar" type="reset">
	</form>




</body>

</html>