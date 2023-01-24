<?php


include('funciones2.php');
include('conexion.php');
cabecera('Instituto');
include('bd.php');
extract($_POST);


$select = "SELECT modulos.NOMBRE as nombre , calificacion.EVALUACION as evaluacion , calificacion.NOTA as nota";
$from = " FROM  modulos , calificacion";
$where = " WHERE true ";



echo "<h3>Selecciona un módulo</h3>";
echo "<form method='post' action=''>";

echo "<label>Módulos:</label><br>";

$Opciones = obtenerArrayOpciones("modulos", "COD_MODULO", "NOMBRE");


echo "<select name='modulos'>";

pintarComboMensaje($Opciones, "Todas", 0);

echo "</select><br>";

echo "<label>Evaluación:</label><br>";
echo "<select name='evaluacion'>";
echo "<option value='todas'>Todas</option>";
echo "<option value='1'>1ª</option>";
echo "<option value='2'>2ª</option>";
echo "<option value='3'>3ª</option>";
echo "</select><br>";
echo "<input type='submit' name='enviar' value='Aceptar'/>";
echo "</form>";


echo $modulos;
if ($modulos > 0 && $evaluacion > 0) {


    $where = " AND modulos.COD_MODULO = '" . $modulos . "'";



}

if ($modulos != 0 && $evaluacion != 0) {


    $where = " WHERE true ";


} else {

    if ($evaluacion == 1) {

        $where = " WHERE true AND EVALUACION = 1";

    }

    if ($evaluacion == 2) {

        $where = " WHERE true AND EVALUACION = 2";

    }
    if ($evaluacion == 3) {

        $where = " WHERE true AND EVALUACION = 3";

    }
}

$sql = $select . $from . $where;

echo $select . $from . $where;

$resultado = ejecutarConsulta($sql);

?>


<html>

<head>
    <title> lista propiedades </title>
</head>

<body>


    <table border="1">
        <tr>
            <th>Localidad</th>
            <th>Domicilio</th>
            <th>Tipo de Vivienda</th>
        </tr>
        <?php

        while ($fila = mysqli_fetch_assoc($resultado)) {
            extract($fila);


            echo ' <tr>
            <td>' . $nombre . '</td>
            <td> ' . $evaluacion . '</td>
            <td> ' . $nota . '</td>
        </tr>';
        }


        ?>
    </table>


</body>


</html>