<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Lineas</title>
</head>

<body>
    <div id="encabezado">
        <h1>Seleccione la línea </h1>
        <form id="form_listado" action="parte2.php" method="post">
            <b>Linea: <br></b>
            <?php

            foreach ($lineas as $linea) {
                echo "<input type='radio' name='linea' value='" . $linea->getCodigo() . "'/>" . $linea->getNombre() . "<br>";
            }
            ?>


            <input type="submit" value="Mostrar" name="enviar" />
        </form>
    </div>
</body>

</html>