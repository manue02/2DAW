<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lineas</title>
    <link href="examen.css" rel="stylesheet" type="text/css">

    <?php

    $conexion = mysqli_connect("localhost", "root", "", "parte2")
        or die("No conecta");
    mysqli_set_charset($conexion, "utf8");

    include("funcionesBD.php");


    ?>

</head>

<body>
    <div id="encabezado">
        <h1>Seleccione la línea.Consulta nº </h1>
    </div>
    <div id="contenido">
        <form action="parte2.php" method="post">
            <b>Linea: <br></b>

            <?php

            $arrayLineas = obtenerArrayOpciones("lineas", "cod_linea", "desc_linea");
            pintarRadio($arrayLineas, "RadioLineas");


            ?>

            <input type="submit" value="Mostrar" name="enviar" />
        </form>
    </div>
</body>

</html>