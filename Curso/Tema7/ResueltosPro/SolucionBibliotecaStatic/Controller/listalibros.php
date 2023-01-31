<?php
require_once("../Model/base.php");
$seleccion="
SELECT l.titulo,a.nombre as autor,i.nombre as idioma,e.nombre  as editorial FROM libros l INNER JOIN idiomas i ON l.ID_IDIOMA=i.ID INNER JOIN autores a ON l.ID_AUTOR=a.ID INNER JOIN editorial e ON l.ID_EDITORIAL=e.ID ";
$where=" WHERE true";
$orden = " ORDER BY l.titulo ,e.nombre";
extract ($_POST);
if ($aid<>0)
	$where.= "  AND a.id=".$aid;
if ($lid<>0)
	$where.= "  AND i.id=".$lid;
if ($eid<>0)
	$where.= "  AND e.id=".$eid;
if (!empty($titulo))
	$where.=" AND titulo LIKE '%".$titulo."%'";
$instruccion=$seleccion.$where.$orden;
//echo $instruccion;
$listado=Base::obtenerLibros($instruccion);
$nohay=($listado==null)?true:false;
/*
echo "<pre>";
print_r($listado);
echo "</pre>";
*/
require_once("../view/listalibros.php");
?>