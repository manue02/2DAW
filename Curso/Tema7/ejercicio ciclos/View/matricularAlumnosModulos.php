<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<html>

	<head>
		<title>Matricular alumnos</title>
	</head>

	<body>


		INSERTE LOS DATOS NECESARIOS:<BR><BR>
		<?php
		echo "<form action='matricularAlumnosModulos.php' method='post'>";
		echo "<select name='alumno'><br>";



		//creamos un combo con los modulos
		foreach ($alumnos as $alumno) {
			echo "<option value='$alumno'>$alumno</option><br>";
		}

		echo "</select><br>";

		echo "<select name='modulo'><br>";

		//obtenemos los modulos del profesor
		
		$modulo = Base::obtenerComboModulos();


		foreach ($modulo as $modulos) {
			echo "<option value='$modulos'>$modulos</option>";
		}



		echo "</select><br>";

		echo "<input type='hidden' name='al' value='" . $alumno . "'>";
		echo "<input type='hidden' name='modulos' value='" . $modulos . "'>";
		echo "<input type='submit' value='Matricular'>

		</form>";
		?>

		<br><br>
		<a href='datos_index.php'>Volver al Menú de Opciones</a><br>



	</body>

	</html>

</body>

</html>