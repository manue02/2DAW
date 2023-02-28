<?php
include("ejer2.php");
if (!isset($_POST['envio'])) {

	echo "<form name='formulario' method='POST'>";
	foreach ($generos as $indice => $valor) {
		echo "<input type='checkbox' name='seleccion[]' value=$indice>" . $valor . "<br>";
	}

	echo "<input type='submit' name='envio' value='consultar'></form>";
} else {
	if (isset($_POST['seleccion'])) {

		echo "<pre>";
		print_r($_POST['seleccion']);
		echo "</pre>";

		$cadenaGeneros = implode(",", $_POST['seleccion']);
		$arrayGeneros = $_POST["seleccion"];
		$encontrado = false;
		foreach ($filmes as $titulo => $datos) {
			if (in_array($datos["genero"], $arrayGeneros)) {
				if (!$encontrado) {
					$encontrado = true;
					echo "<h4>Películas de " . $cadenaGeneros . "</h4>";
					echo "<TABLE BORDER=1><tr><th>Título</th><th>Género</th><th>Fecha</th></tr>";
				}
				echo '<tr><td >';
				echo $titulo;
				echo '</td>';
				echo '<td >';
				echo $datos["genero"];
				echo '</td>';

				echo '<td >';
				echo $datos["fecha"];
				echo '</td></tr>';
			}
		}
		if (!$encontrado)
			echo "No hay películas de los géneros $cadenaGeneros";
		else
			echo "</table>";
	} else {
		echo "No has seleccionado ningún género";

	}
}
?>

</html>
</body>