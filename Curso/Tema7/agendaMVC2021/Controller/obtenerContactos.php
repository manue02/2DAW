<?php


include("../Model/base.php");

print_r($_POST);
//Consulta para obtener
extract($_POST);
$select = "SELECT dni , nombre ,apellido1 ,apellido2, domicilio, tfno";
$from = " FROM contactos";
$where = " WHERE true ";


if (!isset($_POST['enviar'])) {

    if ($nombre != "") {
        $where .= " AND nombre LIKE '%" . $nombre . "%'";
    }
    if ($apellido != "") {
        $where .= " AND apellido1 LIKE '%" . $apellido . "%'";
    }
    if ($telefono != "") {
        $where .= " AND tfno LIKE '%" . $telefono . "%'";
    }

    $where .= "order by " . $orden;


    $sql = $select . $from . $where;
    echo $sql;

}

$resultado = Base::mostrarContactos($sql);
//echo "<pre> " . print_r($resultado) . " </pre>";


include("../View/obtenerContactos.php");
?>