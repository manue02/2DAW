<?php
include('funciones.php');
cabecera('Alumnos');
echo "<div id=\"contenido\">";

$conexion = mysqli_connect("localhost", "root", "", "preparadasb")
	or die("No conecta");
mysqli_set_charset($conexion, "utf8");
include("funcionesBD.php");
extract($_POST);
?>

<body>
	<html>

	<head></head>

	<body>
		<form name="formulario" method="post" ACTION="formularioIntroduccion.php">
			<table>
				<tr>
					<th colspan='2'>Introducción de datos</th>
				</tr>
				<tr>
					<td>Seleccione año:</Td>
					<td><input type="radio" name="año" value="2019/2020">2019/2020<br />
						<input type="radio" name="año" value="2020/2021">2020/2021<br />
						<input type="radio" name="año" value="2021/2022">2021/2022<br />
						<input type="radio" name="año" value="2022/2023" checked>2022/2023<br />
					</td>
				</tr>
				<tr>
					<td>Seleccione curso:</td>
					<td>
						<?php
                        $arrayCursos = obtenerArrayOpciones("cursos", "id", "nombre");
                        pintarCombo($arrayCursos, "ComboCursos");
                        ?>
					</td>
				</tr>
				<tr>
					<td colspan='2' align='center'><input name="envio" value="enviar" type="submit"></td>
				</tr>
			</table>


		</form>


	</body>

	</html>