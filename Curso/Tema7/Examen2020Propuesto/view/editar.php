<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio 1</title>
    <link href="..\view\examen.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="encabezado">
        <h1>
            <?= $operacion ?> de un producto
        </h1>
    </div>
    <div id="contenido">
        <h2>Producto:</h2>
        <form id='form_edit' action='actualizar.php' method='post'>
            <?php
            $codigo = $producto_actual->getCod();
            $nombre = $producto_actual->getNombre();
            $pvp = $producto_actual->getPrecio();
            $familia = $producto_actual->getFamilia();
            $mostrar_edit = "<fieldset><legend>Nombre: </legend><input type='text' name='nombre'   value='$nombre' size=60/><legend>PVP: </legend><input type='text' name='PVP' value='$pvp'/></fieldset>";
            $mostrar_del = "<fieldset><legend>Nombre: </legend><input type='text' name='nombre'   value='$nombre' readonly/><legend>PVP: </legend><input type='text' name='PVP' value='$pvp'readonly/></fieldset>";
            echo "C&oacute;digo: <input type='text' style='color: #F00;background-color: #ccc;' name='codigo' value='$codigo' readonly />";
            echo ($operacion == "Borrado" ? $mostrar_del : $mostrar_edit);
            ?>
            <input type='hidden' value=<?= $operacion ?> name='operacion' />
            <input type='submit' value='Realizar operación' name='actualiza' />
            <input type='submit' value='cancelar' name='cancela' />
            <form>
    </div>
</body>

</html>