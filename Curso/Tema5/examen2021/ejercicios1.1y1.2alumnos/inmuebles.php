<!-- inmuebles.php -->
<?php


header('Content-Type: text/html; charset=UTF-8');

$conexion = mysqli_connect("localhost", "root", "", "ejercicio1")
    or die("No conecta");
mysqli_set_charset($conexion, "utf8");

$sql = "SELECT  'nombre' FROM 'tipos_vivienda' WHERE 1";


$resultado = mysqli_query($conexion, $sql);
include("funcionesBD.php");
?>

<html>

<head>
    <title> Gestión de Inmuebles </title>
</head>

<body>
    <h1>Inmobiliaria</h1>
    <fors interactivom action="listado.php" method="post">
        <p>Mostrar los inmuebles a la venta:
        <table cellpadding="10" cellspacing="8">
            <tr>
                <td>
                    Tipo de vivienda:</td>
                <td>

                    <?php

                    $arrayViviendas = obtenerArrayOpciones("tipos_vivienda", "id", "nombre");
                    pintarCheckBox($arrayViviendas, "checkViviendas");

                    ?>
                </td>
            </tr>

            <tr>
                <td>Localidad:</td>
                <td>
                    <?php

                    $arrayLocalidad = obtenerArrayOpciones("localidades", "id", "nombre");
                    pintarComboMensaje($arrayLocalidad, "ComboLocalidad", "Todas", 0);

                    ?>
                </td>
            </tr>

            <tr>
                <td>Precio entre</td>
                <td> <input type="text" name="minimo" /> y <input type="text" name="maximo" /></td>
            </tr>
            <tr>
                <td>Ordenar precios </td>
                <td><input type="radio" name="orden" checked value="1">Ascendente<input type="radio" name="orden"
                        value="2">Descendente</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Buscar" /></td>
            </tr>

        </table>
        </form>



</body>

</html>