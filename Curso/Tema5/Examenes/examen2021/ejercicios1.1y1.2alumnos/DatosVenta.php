<?php header('Content-Type: text/html; charset=UTF-8');
include('funcionesBd.php');

$conexion = mysqli_connect("localhost", "root", "", "ejercicio1")
    or die("No conecta");
mysqli_set_charset($conexion, "utf8");
$condicion = "propiedades.vendida LIKE '%NO%'";

$sql = " propietarios_clientes.tipo LIKE  '%cliente%'";


?>
<html>

<head>
    <title> GestiÃ³n de Inmuebles </title>
</head>

<body>
    <h1>Inmobiliaria</h1>
    <form action="GrabarVenta.php" method="post">
        <p>Introducir venta:
        <table cellpadding="10" cellspacing="8">
            <tr>
                <td>
                    Vivienda:</td>
                <td>

                    <?php

                    $arrayViviendas = obtenerArrayOpcionesFiltrado("propiedades", "numpropiedad", "domicilio", $condicion);
                    pintarCombo($arrayViviendas, "Domicilio");

                    ?>
                </td>
            </tr>
            <tr>
                <td>Cliente:</td>
                <td>

                    <?php

                    $arrayCliente = obtenerArrayOpcionesFiltrado("propietarios_clientes", "dni", "usuario", $sql);
                    pintarCombo($arrayCliente, "clientes");

                    ?>
                </td>
            </tr>
            <tr>
                <td>Precio de venta</td>
                <td> <input type="text" name="precio" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="muestra" value="Venta" /></td>
            </tr>
        </table>
    </form>
</body>

</html>