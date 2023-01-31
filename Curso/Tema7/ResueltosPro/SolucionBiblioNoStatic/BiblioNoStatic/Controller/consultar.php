<?php
require_once("../Model/base.php");
$miConexion=new Base();
$arrayAutor=$miConexion->obtenerCombo("autores","id","nombre");
$arrayEditorial=$miConexion->obtenerCombo("editorial","id","nombre");
$arrayIdiomas=$miConexion->obtenerCombo("idiomas","id","nombre");
require_once("../View/consultar.php");
?>




