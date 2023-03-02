<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio 1</title>
</head>

<body>

    <?php

    echo "<pre>";
    print_r($_POST['enviar']);
    echo "</pre>";


    ?>

    <h3>Consulta de la línea:
        <?php ?>
    </h3>
    <table border='0'>
        <tr>
            <td colspan='2'>Producto:<b> </td>
            <td>Precio:<b></b></td>
        </tr>
    </table>
    <table border='2' align='center'>
        <tr>
            <td colspan='4' align='center'>Ventas</td>
        </tr>
        <tr>
            <th>Nif</th>
            <th>Cliente</th>
            <th>Unidades</th>
            <th>Fecha</th>
        </tr>
    </table>
    <b>Sin ventas</b>
    <a href="parte1.php">Otra consulta</a>
</body>

</html>