<!-- inmuebles.php -->
<?php header('Content-Type: text/html; charset=UTF-8');
include("conexion.php");
include("..\FuncionesBD.php");
?>

<html>

<head>
    <title> Gestión de Inmuebles </title>
</head>

<body>
    <h1>Inmobiliaria</h1>
    <form action="listado.php" method="post">
        <p>Mostrar los inmuebles a la venta:
        <table cellpadding="10" cellspacing="8">
            <tr>
                <td>
                    Tipo de vivienda:</td>
                <td>
                    <?php
                    $Opciones = obtenerArrayOpciones("tipos_vivienda", "id", "nombre");
                    pintarCheckBox($Opciones, "vivienda");

                    ?>
                </td>
            </tr>

            <tr>
                <td>Localidad:</td>
                <td>

                    <?php

                    //mostrar todas  las localidades que no  estan vendidas 
                    $Opciones = obtenerArrayOpciones("localidades", "id", "nombre");
                    pintarComboMensaje($Opciones, "localidad", "Todas", 0);

                    //consulta para el precio minimo y maximo
                    $consulta = "SELECT MIN(precio) as minimo, MAX(precio) as maximo FROM propiedades";
                    //echo $consulta;
                    $resultado = ejecutarConsulta($consulta);

                    $fila = mysqli_fetch_array($resultado);
                    $minimo = $fila["minimo"];
                    $maximo = $fila["maximo"];
                    ?>
                </td>
            </tr>

            <tr>
                <td>Precio entre</td>
                <?php
                echo "<td> <input type='text' name='minimo' value=" . $minimo . " /> y <input type='text' name='maximo'
                        value=" . $maximo . " />";
                ?>
                </td>
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