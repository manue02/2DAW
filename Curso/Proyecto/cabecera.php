<header>
	Usuario:
	<?php echo $_SESSION['usuario']['NOMBRE'] ?>

	<a href="categorias.php">Seguir Comprando</a>
	<a href="carrito.php">Ver carrito</a>



	<?php
	if (isset($_SESSION["realizado"])) {
		echo "<p>" . $_SESSION["realizado"] . "</p>";
		unset($_SESSION["realizado"]);
	}
	if ($_SESSION['usuario']['NOMBRE'] == "admin") {
		echo "<a href='nuevo_cat1.php'> Nuevo catalogo </a>";

	}

	?>
	<a href="logout.php">Cerrar sesión</a>

</header>
<hr>