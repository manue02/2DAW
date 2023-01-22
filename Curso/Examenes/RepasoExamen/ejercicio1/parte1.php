<?php

include("..\FuncionesBD.php");
include("..\conexion.php");


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lineas</title>
    <link href="examen.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    session_start();

    //contador de consultas
    if (!isset($_COOKIE['contador'])) {
        setcookie("contador", 1, time() + 3600);
    } else {
        $contador = $_COOKIE['contador'];
        $contador++;
        setcookie("contador", $contador, time() + 3600);
    }


    echo ' <div id="encabezado">
        <h1>Seleccione la línea.Consulta nº ' . $contador . '</h1>
    </div>';
    ?>
    <div id="contenido">
        <form action="parte2.php" method="post">
            <b>Linea: <br></b>
            <?php

            $OpcionesLinea = obtenerArrayOpciones("lineas", "cod_linea", "desc_linea");
            pintarRadio($OpcionesLinea, "RadioLinea");

            ?>
            <input type="submit" value="Mostrar" name="enviar" />
        </form>
    </div>
</body>

</html>