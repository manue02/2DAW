Se va a grabar la venta siguiente<br>
<?php

include('funcionesBd.php');

$conexion = mysqli_connect("localhost", "root", "", "ejercicio1")
	or die("No conecta");
mysqli_set_charset($conexion, "utf8");
extract($_POST);

$sql1 = "SELECT propietarios_clientes.usuario as nombre FROM propietarios_clientes WHERE true AND propietarios_clientes.dni = '$clientes'";
$sql3 = "SELECT propiedades.domicilio as nombreDomicilio FROM propiedades WHERE true AND propiedades.numpropiedad = '$Domicilio'";

$resultado2 = mysqli_query($conexion, $sql1);
$resultado3 = mysqli_query($conexion, $sql3);

echo $sql1;
?>
<table border="1" cellpadding="10">
	<form method='POST'>
		<tr>
			<td>Domicilio</td>
			<td><b>

					<?php


                    while ($fila = mysqli_fetch_assoc($resultado3)) {
	                    extract($fila);

	                    echo $nombreDomicilio;

                    }
                    $sql = "SELECT localidades.nombre as nombreLocalidad , propiedades.precio as precioLocalidad FROM propiedades inner join localidades on propiedades.localidad=localidades.id  WHERE true AND propiedades.domicilio = '$nombreDomicilio'";
                    $resultado = mysqli_query($conexion, $sql);

                    ?>
				</b></td>
			<td>Localidad</td>
			<td><b>

					<?php


                    while ($fila = mysqli_fetch_assoc($resultado)) {
	                    extract($fila);

	                    echo $nombreLocalidad;

                    }


                    ?>

				</b></td>
		</tr>
		<tr>
			<td>Precio de salida</td>
			<td><b>


					<?php

                    echo $precioLocalidad;

                    ?>
				</b></td>
			<td>Precio de venta</td>
			<td><b>
					<?php
                    echo $precio;
                    ?>
				</b></td>
		</tr>
		<tr>
			<td colspan="2">Cliente</td>
			<td colspan="2"><b>

					<?php

                    while ($fila = mysqli_fetch_assoc($resultado2)) {
	                    extract($fila);

	                    echo $nombre;

                    }

                    ?>

				</b></td>
		</tr>

		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Grabar" />
			<td colspan="2"><input type="submit" name="cancelar" value="Cancelar" /></td>
			<?php

            $sql4 = "UPDATE propiedades\n"

            	. "SET domicilio = 'Avenida de España 24', vendida = 'SI' , precio = '1265000'\n"

            	. "WHERE propiedades.domicilio = 'Avenida de España 23'";
            $resultado3 = mysqli_query($conexion, $sql4);
            echo $sql4;


            ?>
		</tr>



</table>
</form>
<?php
//para grabar la fecha en mysql 
$hoy = date('Y-m-d');
/* si se pulsa cancelar
header("Location:DatosVenta.php");
*/

?>