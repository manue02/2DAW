<?php
require_once("../Model/base.php");

extract($_POST);

echo "<pre> ";
echo print_r($_POST);
echo "</pre>";




$select = "SELECT DISTINCT encuesta.id , encuesta.nombre , estudios.denominacion , postres.nombre as nombrepostre";
$from = " FROM relacion , encuesta , postres , estudios";
$where = " WHERE postres.id = relacion.id_caracteristica ";

if (!isset($_POST['enviar'])) {

    if ($nombre != "") {
        $where .= " AND encuesta.nombre LIKE '%" . $nombre . "%'";
    }
    if ($estudia != "Seleccione") {
        $where .= " AND estudios.id LIKE '%" . $estudia . "%'";
    }


    $sql = $select . $from . $where;


}
echo $sql;



$resultado = Base::consultaPrincipal($sql);


require_once("../view/listausuarios.php");
?>