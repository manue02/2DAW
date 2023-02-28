<?php
require_once("../Model/base.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST["Consultar"])) {

    $nombre = $_POST["nombre"];
    $estudios = $_POST["estudia"];

    $select = "SELECT encuesta.id , encuesta.nombre ,estudios.denominacion ";
    $FROM = " FROM `encuesta` INNER JOIN estudios ON encuesta.estudia = estudios.id ";
    $where = " WHERE nombre LIKE '%$nombre%'";

    if ($estudios != -1) {
        $where .= " AND estudia = $estudios";
    }
    $sql = $select . $FROM . $where;

    echo $sql;


}

$Consulta = Base::consultaPrincipal($sql);







require_once("../view/listausuarios.php");
?>